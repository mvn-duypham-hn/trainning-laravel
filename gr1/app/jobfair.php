<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobfair extends Model
{
    protected $table = 'jobfairs';
    public $timestamps = false;

    public function jobs()
    {
        return $this->hasMany('App\job','jobfair_id','id');
    }

    public function jfcompany()
    {
        return $this->belongsTo('App\jfcompany','jfcompany_id','id');
    }
}
