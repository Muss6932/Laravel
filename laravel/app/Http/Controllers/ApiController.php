<?php

namespace App\Http\Controllers;

use App\Model\Actors;
use App\Model\Categories;
use App\Model\Directors;
use App\Model\Movies;
use App\Model\Sessions;
use Illuminate\Support\Facades\DB;


/**
 * get API
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    public function getBestDirectors()
    {
        $directors = Directors::all();

//        dump($directors->toJson());exit();

        return response()->json(
            $directors
        );

    }


    public function getMoviesPerCategory()
    {

        $categories = Categories::all();

        $tab = [];

        foreach ($categories as $categorie){

            $categoriestitle = $categorie->title;
            $categoriescountmovies = $categorie->movies->count();

            if($categoriescountmovies != 0){
                array_push($tab, [$categoriestitle, $categoriescountmovies]);
            }
        }

//        exit(dump($object));

        return response()->json($tab);
    }

    public function getSessionsPerMonth () {

//        $directors = [];
//
//        $begin = new \DateTime('-5 year');
//        $end = new \DateTime('+1year');
//
//        $interval = new \DateInterval('P1Y');
//        $daterange = new \DatePeriod($begin, $interval, $end);
//
//
//        foreach ($daterange as $date) {
//            $obj = new \stdClass();
//            $obj->period = $date->format('Y');
//            $obj->tarantino = 2 + rand(1, 5);
//            $obj->wiliams = 3 + rand(1, 5);
//            $obj->weber = 5 + rand(1, 5);
//            $directors[] = $obj;
//                    }

        $begin      = new \DateTime('2000/01/01');
        $end        = new \DateTime('2000/12/31');
        $interval   = new \DateInterval('P1M');
        $daterange  = new \DatePeriod($begin, $interval, $end);




        $sessionspermonth = [];
        foreach ($daterange as $date) {
            $a = Sessions::where(DB::raw('YEAR(date_session)'), DB::raw('YEAR(CURDATE())'))
                ->where(DB::raw('MONTH(date_session)'), $date->format('m'))
                ->count();
            array_push($sessionspermonth, $a);
        }


        return response()->json($sessionspermonth );
    }



    public function getCategoriePerBestActor() {

        $bestActors = Actors::bestActors();

        $categories = Categories::select('title', 'id')
            ->has('movies')
            ->get()
            ->random(5);

        $categoriesname = [];
        $series = [];

        foreach($categories as $categorie) {
            array_push($categoriesname, $categorie->title);
        };



        foreach( $bestActors as $actor){
            $obj = new \stdClass();
            $obj->name = $actor->fullname;
            $obj->data = [];

            foreach ($categories as $categorie) {
                $a = DB::table('movies')
                    ->select(DB::raw('COUNT(movies.id) as nb'))
                    ->join('categories', 'categories.id', "=", "movies.categories_id")
                    ->join('actors_movies', 'actors_movies.movies_id', "=", "movies.id")
                    ->where('actors_movies.actors_id', '=', $actor->id)
                    ->where('categories.id', '=', $categorie->id)
                    ->first();

                array_push($obj->data, (int)$a->nb);
            }

            array_push($series, $obj);
        };

        $data = [   'categories' => $categoriesname, 'series' => $series
        ];

        return $data;
    }


    public function getCategoriesTitle() {
        $categories = Categories::categoriesTitle();

        $data = [];
        foreach( $categories as $categorie) {
            array_push($data, ['id' => $categorie->id , 'text' => $categorie->title]);
        }

        return ($data);

    }

    public function getActorsName() {
        $actors = Actors::actorsName();

        $tab = [];

        foreach( $actors as $actor){
            $obj = new \stdClass();
            $obj->id = $actor->id;
            $obj->fullname = $actor->fullname;

            $tab[] = $obj;
        };

        return ($tab);
    }
















}