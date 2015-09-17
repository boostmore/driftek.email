<?php

namespace App\Http\Controllers\Tools;

use App\Helper\Dictionary;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helper\TextTools;

class DomainGeneratorController extends Controller
{
    public $dictionary;

    public function index() {
        return view('pages.tools.domain_generator.index');
    }

    public function generate(Request $request, Dictionary $dictionary) {
        $this->dictionary = $dictionary;
        $domains = array();

        for($i = 0; $i < $request->get('domain_count'); $i++) {
            $domains[] = $this->generateDomain($request);
        }

        return view('pages.tools.domain_generator.show',['domains' => $domains]);
    }

    public function generateDomain(Request $request) {
        $domain = "";

        if(strcmp($request->get('prefix_type'),"") !== 0) {
            $domain = $this->getDomainPart($request->get('prefix_type'),$request->get('prefix_length')) . $request->get('prefix_separator');
        }

        $domain .= $this->getDomainPart("W",15);

        if(strcmp($request->get('postfix_type'),"") !== 0) {
            $domain .= $request->get('postfix_separator') . $this->getDomainPart($request->get('postfix_type'),$request->get('postfix_length'));
        }

        return $domain . $request->get('tld');
    }

    public function getDomainPart($type,$length) {
        if(strcmp($type,"W") === 0) {

            return strtolower($this->dictionary->getWord());
        } else if (strcmp($type,"A") === 0) {
            return TextTools::getAlphaString($length);
        } else if (strcmp($type,"N") === 0) {
            return TextTools::getNumericString($length);
        }  else if (strcmp($type,"AN") === 0) {
            return TextTools::getAlphaNumericString($length);
        }

    }

}
