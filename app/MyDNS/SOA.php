<?php

namespace App\MyDNS;

use Illuminate\Database\Eloquent\Model;

class SOA extends Model
{

    public $timestamps = false;

    protected $table = "soa";

    protected $connection = "mysql_mydns";

    protected $fillable = ['name'];

    public function setOriginAttribute($origin)
    {
        $this->attributes['origin'] = $origin;
        $this->attributes['ns']     = "ns.$origin";
        $this->attributes['mbox']   = "postmaster.$origin";

    }

    public function rrs()
    {
      return $this->hasMany('App\Helper\MyDNS\RR');
    }
}