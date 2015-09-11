<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Actors extends Model {


    protected $table = 'actors';

    public $timestamps = false;


    public function movies()
    {

        return $this->hasMany('App\Model\Movies');
    }



}