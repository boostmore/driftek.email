<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
    protected $fillable = ['name','url'];


    //TODO: Include this function in an extended class of model. change all Models to use new class.
    /**
     * Returns an array for select statements to use for the options.
     *
     * array(id => name);
     *
     * @return array
     */

    public function getSelectArray()
    {
        $selectOptions = array();
        $models = $this->all();

        foreach($models as $model) {
            $selectOptions[$model->id] = $model->name;
        }

        return $selectOptions;
    }

    public function accounts()
    {
      return $this->hasMany('App\RegistrarAccount');
    }
}
