<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['name','purchased_on','expires_on','registrar_account_id','dns_template_id'];

    public function dnsTemplate()
    {
        return $this->belongsTo('\App\DnsTemplate');
    }

    public function setDnsTemplateIdAttribute($value)
    {
        $this->attributes['dns_template_id'] = $value ?: null;
    }

    public function setRegistrarAccountIdAttribute($value)
    {
        $this->attributes['registrar_account_id'] = $value ?: null;
    }
}
