<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * Every Email belongs to a specific domain
     * example@aol.com would be "aol.com"
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emailDomain()
    {
        return $this->belongsTo('App\EmailDomain');
    }

    /**
     * Every Email has at least 1 opt in but can have many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function optIns()
    {
        return $this->hasMany('App\OptIn');
    }
}
