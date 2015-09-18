<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Tasks extends Model
{


    protected $table = 'tasks';


    public function movies()
    {

        return $this->belongsTo('App\Model\Movies');
    }

    public function administrators()
    {

        return $this->belongsTo('App\Model\Administrators');
    }


}