<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Actors extends Model {


    protected $table = 'actors';

    public $timestamps = false;


    public function movies()
    {

        return $this->hasMany('App\Model\Movies');
    }

    public function scopeBestActors($query) {


        return $query   ->select('actors.id', DB::raw('CONCAT(actors.firstname, " ", actors.lastname) as fullname, count(am.actors_id) as nbdefilm'))
                        ->join('actors_movies as am', 'am.actors_id', '=', 'actors.id')
                        ->groupBy('actors.id')
                        ->orderBy(DB::raw('count(am.actors_id)'), 'desc')
                        ->take(5)
                        ->get();
    }


    public function scopeActorsName($query) {

        return $query->select('id', DB::raw('CONCAT(firstname, " ", lastname) as fullname'))->get();
    }
}

