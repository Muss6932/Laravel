<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Categories extends Model {


    protected $table = 'categories';




    public function movies(){

        return $this->hasMany('App\Model\Movies');
    }


}