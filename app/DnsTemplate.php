<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DnsTemplate extends Model
{
    use softDeletes;

    protected $fillable = ['name','description'];

    protected $dates = ['deleted_ad'];

    public function rrs()
    {
        return $this->hasMany('App\DnsTemplateRr');
    }

    public function domains()
    {
        return $this->hasMany('App\Domain');
    }

    public function getSelectArray()
    {
        $selectOptions = array();
        $models = $this->all();

        foreach($models as $model) {
            $selectOptions[$model->id] = $model->name;
        }

        return $selectOptions;
    }
}
