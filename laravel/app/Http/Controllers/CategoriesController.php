<?php

namespace App\Http\Controllers;
use App\Model\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CategoriesController extends Controller
{


    public function getIndex(){


//        dump($this->categorieMaxBudget());
//        exit();

        $datas = [
            "categories"    => Categories::all(),
            "random"        => $this->random(),
            "categorieMaxMovies"     => $this->categorieMaxMovies()[0],
            "categorieMaxBudget"     => $this->categorieMaxBudget()[0]
        ];

        return view('Categories/index', $datas);
    }

    public function getCreate(){

        return view('Categories/create');
    }


    public function getRead(){

        return view('Categories/read');
    }


    public function getUpdate(){

        return view('Categories/update');
    }

    public function getDelete($id){
        $categorie = Categories::find($id);
        $categorie->delete();

        Session::flash('success', "La catégorie {$categorie->title} a bien été supprimé. ");

        return Redirect::route('categories.index');
    }

//-----------------------------------------------------------------------------------------------------------
//                  REQUETE
//-----------------------------------------------------------------------------------------------------------

    public function random()
    {
        $categories = Categories::all();
        $categorie = $categories->random();




        $sumComments = 0;
        foreach ( $categorie->movies as $movie){
            $sumComments += $movie->comments->count();
        }



        $sumActors = DB::table('movies')->join('categories', 'movies.categories_id', '=', 'categories.id')->join('actors_movies', 'actors_movies.movies_id', '=', 'movies.id')->where('movies.categories_id', $categorie->id)->count();




        $random = [ 'categorie'   => $categorie ,
                    'sumComments' => $sumComments,
                    'sumActors'   => $sumActors
                  ];

        return $random;
    }









    public function categorieSansFilm()
    {
        $categories = Categories::all();
        $catSansFilm = 0;
    }

    public function categorieMaxMovies()
    {
        $categorieMaxMovies = DB::select('
            SELECT categories.title, COUNT(movies.categories_id) AS countmovies
            FROM categories
            INNER JOIN movies
            ON categories.id = movies.categories_id
            GROUP BY categories.id
            ORDER BY COUNT(movies.categories_id) DESC
            LIMIT 1');

        return $categorieMaxMovies;
    }

    public function categorieMaxBudget()
    {
        $categorieMaxBudget = DB::select('
        SELECT categories.title, SUM(movies.budget) AS sumbudget
        FROM categories
        INNER JOIN movies
        ON categories.id = movies.categories_id
        GROUP BY categories.id
        ORDER BY SUM(movies.budget) DESC
        LIMIT 1
        ');

        return $categorieMaxBudget;
    }


}