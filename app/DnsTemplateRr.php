<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DnsTemplateRr extends Model
{
    public $timestamps = false;

    protected $fillable = ['name','data','aux','ttl','type'];

    protected  $TYPES = array(
        'A'     => 'A',
        'AAAA'  => 'AAAA',
        'ALIAS' => 'ALIAS',
        'CNAME' => 'CNAME',
        'HINFO' => 'HINFO',
        'MX'    => 'MX',
        'NAPTR' => 'NAPTR',
        'NS'    => 'NS',
        'PTR'   => 'PTR',
        'RP'    => 'RP',
        'SRV'   => 'SRV',
        'TXT'   => 'TXT');

    public function dnsTemplate()
    {
        return $this->belongsTo('App\DnsTemplate');
    }

    public function rrTypes()
    {
        return $this->TYPES;
    }

    public function setTtlAttribute($ttl = 1800)
    {
        if($ttl <= 0) {
            $this->attributes['ttl'] = 1800;
        } else {
            $this->attributes['ttl'] = $ttl;
        }
    }
}
