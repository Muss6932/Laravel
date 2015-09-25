<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Categories extends Model {


    protected $table = 'categories';




    public function movies(){

        return $this->hasMany('App\Model\Movies');
    }




    public function scopeCategoriesTitle($query) {

        return $query->select('id','title')->get();
    }










//    public function scopeFourbestcategories ($query) {
//
//        return $query
//            ->join('movies', 'movies.categories_id', '=', 'categories.id')
//            ->groupBy('categories.id')
//            ->orderBy(DB::raw('SUM(movies.id)'), 'desc')
//            ->take(4)
//            ->get();
//    }




//$directors = Directors::has('movies')
//->join('directors_movies', 'directors.id', '=', 'directors_movies.directors_id')
//->groupBy('directors.id')
//->orderBy(DB::raw("COUNT(directors_movies.movies_id)"), 'desc')
//->take(4)
//->get();


//SELECT categories.title, sum(movies.budget)
//FROM categories
//INNER JOIN movies ON movies.categories_id = categories.id
//GROUP BY categories.id
//ORDER BY sum(movies.budget) DESC

}