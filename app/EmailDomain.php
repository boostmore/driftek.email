<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailDomain extends Model
{
    public $timestamps = false;

    /**
     * Every Email Domain has multiple users (emails)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany('App\Email');
    }
}
