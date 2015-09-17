<?php

namespace App\Helper;

class TextTools {

    /**
     * Creates a string with random alpha characters (a-z) of given length.
     *
     * @param $length
     * @return string
     */
    public static function getAlphaString($length)
    {
        $alpha = range('a','z');

        return self::getRandomString($alpha,$length);
    }

    /**
     * Creates a string with random numeric characters (0-9) of given length.
     *
     * @param $length
     * @return string
     */
    public static function getNumericString($length)
    {
        $number = range(0,9);

        return self::getRandomString($number,$length);
    }

    /**
     * Creates a string with random alpha/numeric characters (a-z,0-9) of given length
     *
     * @param $length
     * @return string
     */
    public static function getAlphaNumericString($length)
    {
        $alpha_numeric = array_merge(range('a','z'),range(0,9));

        return self::getRandomString($alpha_numeric,$length);

    }

    /**
     * Creates a string with random elements of array argument.
     * String will be of given length.
     *
     * @param $array
     * @param $length
     * @return string
     */
    public static function getRandomString($array,$length)
    {
        $string = '';

        for($i = 0; $i < $length; $i++) {
            $string .= $array[array_rand($array)];
        }

        return $string;
    }
}