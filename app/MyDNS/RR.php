<?php
namespace App\MyDNS;

use Illuminate\Database\Eloquent\Model;

class RR extends Model
{

    public $timestamps = false;

    protected $table = "rr";

    protected $connection = "mysql_mydns";

    protected $fillable = ['zone','name','data','aux','ttl','type'];

}