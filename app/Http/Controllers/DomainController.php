<?php

namespace App\Http\Controllers;

use App\Domain;
use App\DnsTemplate;
use App\MyDNS\MyDNS;
use App\MyDNS\RR;
use App\MyDNS\SOA;
use App\RegistrarAccount;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.domain.index',array('domain' => \App\Domain::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function bulkCreate()
    {
        $dnsTemplate = new DnsTemplate();
        $accounts    = new RegistrarAccount();

        return view('pages.domain.bulkcreate',['dnsTemplates' => $dnsTemplate->getSelectArray(), 'accounts' => $accounts->getSelectArray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function bulkStore(Request $request)
    {
        $myDNS       = new MyDNS();

        $domains = explode("\n",str_replace("\r","",$request->get('domains')));

        foreach($domains as $domain_name) {
            $domain = new Domain();
            $domain->name = $domain_name;
            $domain->fill($request->all());
            $domain->save();

            $this->setRRsTemplate($domain);
            //$domain->setSMTP();
        }

    }

    public function setRRsTemplate($domain)
    {
        foreach($domain->dnsTemplate->rrs as $rr_template) {

            $soa = SOA::firstOrNew(['origin' => $domain->name]);
            $soa->origin = $domain->name;
            $soa->save();

            RR::firstOrCreate(
                ['name' => $rr_template->name,
                 'data' => $rr_template->data,
                 'aux'  => $rr_template->aux,
                 'ttl'  => $rr_template->ttl,
                 'type' => $rr_template->type,
                 'zone' => $soa->id,
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
