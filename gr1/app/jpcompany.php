<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jpcompany extends Model
{
    protected $table='jpcompanies';;
    public $timestamps=false;

    public function jobs()
    {
        return $this->hasMany('App\job','jpcompany_id','id');
    }
}
