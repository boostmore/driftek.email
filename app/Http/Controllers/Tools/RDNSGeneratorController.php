<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RDNSGeneratorController extends Controller
{
    const __DICT_PATH__ = '/resources/assets/tools/english';
    /**
     * Displays Tool Parameters
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.tools.rdns_generator.index');
    }

    /**
     * Generates RDNS based on Post Parameters
     *
     * @return Response
     */
    public function generate(Request $request)
    {
        $this->validate($request, [
            'rdns_domain' => 'required',
            'octet_start' => 'required|integer|between:0,254',
            'octet_end'   => 'required|integer|between:1,255',
            'range'       => 'required|ip',
            'ns1'         => 'required',
            'ns2'         => 'required',
        ]);

        if($request->get('octet_start') >= $request->get('octet_end')) {
            return $this->buildFailedValidationResponse($request,['Octet Start must be less than Octet End']);
        }

        //return $request->get('octet_end');

        $random_words   = explode("\n", strtolower(file_get_contents(base_path() . self::__DICT_PATH__)));
        $random_indexes = array_rand($random_words,($request->get('octet_end') - $request->get('octet_start') + 1));
        $domains        = array();

        foreach($random_indexes as $index) {
            $domains[] = $random_words[$index];
        }

        $octets = explode(".",$request->get('range'));
        $inaddr = $octets[2] . "." . $octets[1] . "." . $octets[0] . ".in-addr.arpa";

        return view('pages.tools.rdns_generator.show',array('domains' => $domains, 'inaddr' => $inaddr));
    }
}
