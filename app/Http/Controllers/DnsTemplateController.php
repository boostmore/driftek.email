<?php

namespace App\Http\Controllers;

use App\DnsTemplate;
use App\DnsTemplateRr;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DnsTemplateController extends Controller
{
    public function index()
    {
        $dnsTemplates = DnsTemplate::all();

        return view('pages.domain.template.index',['dnsTemplates' => $dnsTemplates]);
    }

    public function create()
    {
        return view('pages.domain.template.create',['dnsTemplate' => new DnsTemplate()]);
    }

    public function store(Request $request)
    {
        $template = new DnsTemplate();
        $template->name = $request->get('name');
        $template->description = $request->get('description');
        $template->save();

        $rrs = $request->get('rrfields');

        if(is_array($rrs)) {
            foreach($rrs as $rr_input) {
                $rr = new DnsTemplateRr();
                $rr->fill($rr_input);
                $rr->dns_template_id = $template->id;
                $rr->save();
            }
        }

        return $this->index();

    }

    public function show($id)
    {
        $dnsTemplate = DnsTemplate::findOrFail($id);
        return view('pages.domain.template.show',['dnsTemplate' => $dnsTemplate]);
    }

    public function edit($id)
    {
        $dnsTemplate = DnsTemplate::findOrFail($id);
        return view('pages.domain.template.edit',['dnsTemplate' => $dnsTemplate]);
    }

    public function update($id,Request $request)
    {
        $template = DnsTemplate::findOrFail($id);

        $template->name = $request->get('name');
        $template->description = $request->get('description');
        $template->update();

        $rrs = $request->get('rrfields');

        if(is_array($rrs)) {
            foreach($rrs as $rr_input) {
                if(array_key_exists('delete',$rr_input) && strcmp($rr_input['delete'],'true') === 0) {
                    $rr = DnsTemplateRr::findOrFail($rr_input['id']);
                    $rr->delete();
                } else if (array_key_exists('id',$rr_input)) {
                    $rr = DnsTemplateRr::findOrFail($rr_input['id']);
                    $rr->fill($rr_input);
                    $rr->dns_template_id = $template->id;
                    $rr->update();
                } else {
                    $rr = new DnsTemplateRr();
                    $rr->fill($rr_input);
                    $rr->dns_template_id = $template->id;
                    $rr->save();
                }
            }
        }

        return $this->show($id);
    }

    public function destroy($id)
    {
        DnsTemplate::destroy($id);

        return $this->index();
    }
}
