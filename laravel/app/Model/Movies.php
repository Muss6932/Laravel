<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Movies extends Model {


    protected $table = 'movies'; /* le nom de ma table */

    public $timestamps = false;


    public function categories(){

        return $this->belongsTo('App\Model\Categories');
    }



}