<?php

namespace App\Http\Controllers;

use App\OptIn;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OptInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("api.optin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'email'      => 'required|email',
                'optin_date' => array('required', 'Regex:/^(19\d{2}|20\d{2})-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1]) ([0-1][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/'),
                'ip_address' => array('required', 'Regex:/^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/'),
                'optin_url'  => 'required',
            ]
        );

        $request->email_domain = substr($request->get('email'),strpos($request->get('email'),'@')+1);
        $email_domain = \App\EmailDomain::where('email_domain', $request->email_domain)->first();

        if(!$email_domain) {
            $email_domain = new \App\EmailDomain();
            $email_domain->email_domain = $request->email_domain;
            $email_domain->tld          = substr($email_domain->email_domain,strpos($email_domain->email_domain,".")+1);
            $email_domain->save();
        }
        
        $email = new \App\Email();
        $email->email = $request->get('email');
        $email->email_domain_id = $email_domain->id;
        $email->save();


        $optin = new \App\OptIn();
        $optin->email_id = $email->id;
        $optin->optin_date = Carbon::createFromFormat('Y-m-d H:m:s',$request->optin_date);
        $optin->ip_address = $request->ip_address;
        $optin->optin_url  = $request->optin_url;
        $optin->save();

        dd($optin);


        return view('api.optin.response');
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
