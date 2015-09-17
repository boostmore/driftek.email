<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptIn extends Model
{


    protected $fillable = ['email','optin_date','ip_address','optin_url'];

    protected $dates = ['optin_date'];

    public static function create() {

        parent::create();
    }

    /**
     * Every opt in has an email
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function email()
    {
        return $this->belongsTo('/App/Email');
    }
}
