<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Cinema extends Model {


    protected $table = 'cinema';


    public function sessions()
    {

        return $this->hasMany('App\Model\Sessions');
    }

}