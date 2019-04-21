<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cd extends Model
{
    protected $table='cds';
    public $timestamps=false;
    public function jobs()
    {
        return $this->belongsToMany('App\job','cdjobs','job_id','cd_id');
    }
}
