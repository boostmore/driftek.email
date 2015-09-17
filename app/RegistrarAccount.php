<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrarAccount extends Model
{
    protected $fillable = ['username','password','first','last','email','address','city','state','zip','phone','registrar_id'];


    public function getSelectArray()
    {
        $selectOptions = array();
        $models = $this->all();

        foreach($models as $model) {
            $selectOptions[$model->id] = $model->username;
        }

        return $selectOptions;
    }

    public function registrar()
    {
      return $this->belongsTo('App\Registrar');
    }
}
