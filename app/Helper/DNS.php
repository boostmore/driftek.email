<?php
namespace App\Helper;

class DNS
{
    public static function getIP($host)
    {
        return gethostbyname($host);
    }

    /**
     * Checks to make sure all IPs associated with the $hostname MX have a RDNS Host record.
     *
     * @param $hostname
     * @return bool
     */
    public static function checkMxRDNS($hostname)
    {
        $mxhosts = array();

        if(getmxrr($hostname,$mxhosts))
        {
            foreach($mxhosts as $mxhost)
            {
                if(!$mx_ip = self::getIP($mxhost))
                {
                    return false;
                }
                if(!self::getHost($mx_ip))
                {
                    return false;
                }
            }
        } else {
            return false;
        }

        //all hosts returned.
        return true;
    }

    public static function getHost($ip)
    {
        $host = gethostbyaddr($ip);

        if(strcmp($host,$ip) === 0) {
            return false;
        } else {
            return true;
        }
    }
}