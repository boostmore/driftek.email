<?php

namespace App\Helper;

class Dictionary {

    public $dictionary_path = "/resources/assets/tools/english";
    public $dictionary;

    public function __construct() {
        $this->dictionary = explode("\n",file_get_contents(base_path() . $this->dictionary_path));
        shuffle($this->dictionary);
    }

    public function getWord() {
        return $this->dictionary[mt_rand(0, count($this->dictionary) - 1)];
    }

}