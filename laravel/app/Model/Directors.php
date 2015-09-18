<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Directors extends Model {


    protected $table = 'directors';

    public $timestamps = false;


    public function movies()
    {

        return $this->belongsToMany('App\Model\Movies');
    }
}