<?php

namespace App\Http\Controllers;
use App\Model\Movies;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Zend\I18n\Validator\DateTime;


/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class MoviesController extends Controller
{


    public function index($column = null, $value = null){

        if ($column == null && $value == null) {
            $movies =  Movies::all();
        }
        else {
            $movies = Movies::where($column, '=', $value)->get();
        }

        $datas = [
            'movies'                => $movies,
            'column'                => $column,
            'value'                 => $value,
            'budgetAnnee'           => $this->budgetAnnee(),
            'countMovies'           => $this->countMovies(),
            'countMoviesInCover'    => $this->countMoviesInCover(),
            'countMoviesTomorrow'   => $this->countMoviesTomorrow(),
            'countMoviesInactive'   => $this->countMoviesInactive()

        ];

        return view('Movies/index', $datas);
    }


    public function create(){

        return view('Movies/create');
    }


    public function read($id = null){
        $datas = [
            'movie' => Movies::find($id)
        ];

        return view('Movies/read', $datas);
    }


    public function update($id){
        $movie = Movies::find($id);
        $movie->update();

        return view('Movies/update', ['id' => $id]);
    }

    public function delete($id){
        $movie = Movies::find($id);
        $movie->delete();

        Session::flash('success', "Le film {$movie->title} a bien été supprimé. ");


        return Redirect::route('movies.index');
    }

    public function search($langue = "fr", $visibilite = 1, $duree = 2){

        return view('Movies/search', [  'langue'     => $langue,
                                        'visibilite' => $visibilite,
                                        'duree'      => $duree]);
    }


    public function activate($id, $activate, $value)
    {
        $movie = Movies::find($id);
        $movie->$activate = $value;

        $movie->save();

        if ($activate == "visible")
            if ($movie->$activate == 1 ) {
                Session::flash('success', "Le film {$movie->title} est visible. ");
            }
            else {
                Session::flash('danger', "Le film {$movie->title} n'est plus visible. ");
            }
        else {
            if ($movie->$activate == 1) {
                Session::flash('success', "Le film {$movie->title} est en couverture. ");
            } else {
                Session::flash('danger', "Le film {$movie->title} n'est plus en couverture. ");
            }
        }

        return Redirect::route('movies.index');
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function Select(Request $request)
    {

        $movies = $request->input('selectFilm');
        $submit = $request->input('submit');

        if (count($movies) == 0) {
            Session::flash('warning', "Aucun film sélectionné");

        } else {
            if ($submit == 'supprimer') {
                foreach ($movies as $id) {
                    $movie = Movies::find($id);
                    $movie->delete();
                }
                Session::flash('success', "Le ou les films ont bien été supprimé. ");
            } elseif ($submit == 'activer') {
                foreach ($movies as $id) {
                    $movie = Movies::find($id);
                    $movie->visible = 1;

                    $movie->save();
                }
                Session::flash('success', "Les films sélectionnés sont visibles. ");

            } elseif ($submit == 'desactiver') {
                foreach ($movies as $id) {
                    $movie = Movies::find($id);
                    $movie->visible = 0;

                    $movie->save();
                }
                Session::flash('success', "Les films sélectionnés ne sont plus visibles.");

            }


            return Redirect::route('movies.index');
        }
    }


//------------------------------------------------------------------------------------------------------------
//              REQUETES
//------------------------------------------------------------------------------------------------------------


    public function budgetAnnee()
    {
        $now = new \DateTime();
        $year = $now->format('Y');

        $budget = number_format((Movies::where('annee', "=", $year)->sum('budget')), 0 , ",", " ");

        $tab= [
            'budget' => $budget,
            'year'   => $year
        ];

        return $tab;

    }

    public function countMovies()
    {
        $countMovies = Movies::all()->count();

        return $countMovies;
    }

    public function countMoviesInCover()
    {
        $countMoviesInCover = Movies::where('cover', '=', 1)->count();

        return $countMoviesInCover;
    }


    public function countMoviesTomorrow()
    {
        $now = new \DateTime();

        $countMoviesTomorrow = Movies::where('date_release', '>', $now)->count();

        return $countMoviesTomorrow;
    }

    public function countMoviesInactive()
    {
        $countMoviesInactive = Movies::where('visible', '=', 0)->count();

        return $countMoviesInactive;
    }


}