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

        return $this->belongsToMany('App\Model\Actors');
    }

    public function directors()
    {

        return $this->hasMany('App\Model\Directors');
    }

    public function sessions()
    {

        return $this->hasMany('App\Model\Sessions');
    }







    public function scopeBestcat($query, $id, $time)
    {

        $time2 = sprintf("%02d", $time + 1);
        return $query->select('movies.budget')->join('categories', 'movies.categories_id', '=', 'categories.id')->where('categories.id', $id)->whereBetween('movies.date_release', array('2015-' . $time . '-00', '2015-' . $time2 . '-00'));
    }


}