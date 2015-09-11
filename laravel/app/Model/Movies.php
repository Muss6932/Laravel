<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Movies extends Model {

    use SoftDeletes;



    protected $table = 'movies'; /* le nom de ma table */

    public $timestamps = false;

    protected $dates = ['date_deleted'];


    

    public function categories(){

        return $this->belongsTo('App\Model\Categories');
    }


    public function comments()
    {

        return $this->hasMany('App\Model\Comments');
    }

    public function actors()
    {

        return $this->hasMany('App\Model\Actors');
    }

}