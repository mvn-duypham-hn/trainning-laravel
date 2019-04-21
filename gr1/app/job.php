<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $table='jobs';
    public $timestamps=false;

    public function jpcompany()
    {
        return $this->belongsTo('App\jpcompany','jpcompany_id','id');
    }

    public function cds()
    {
        return $this->belongsToMany('App\cd','cdjobs','job_id','cd_id');
    }

    public function jobfair()
    {
        return $this->belongsTo('App\jobfair','jobfair_id','id');
    }
}
