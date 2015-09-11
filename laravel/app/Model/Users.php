<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Users extends Model {


    protected $table = 'user';


    public function comments()
    {

        return $this->hasMany('App\Model\Comments');
    }

}