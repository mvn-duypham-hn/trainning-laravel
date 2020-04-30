<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jfcompany extends Model
{
    protected $table='jfcompanies';
    public $timestamps=false;

    public function jobfairs()
    {
        return $this->hasMany('App\jobfair','jfcompany_id','id');
    }
}
