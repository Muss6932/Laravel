<?php

namespace App\Http\Controllers;
use App\Http\Requests\MoviesRequest;
use App\Model\Actors;
use App\Model\Categories;
use App\Model\Comments;
use App\Model\Directors;
use App\Model\Movies;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


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

        $datas = [
            'categories' => $this->categories(),
            'actors' => $this->actors(),
            'directors' => $this->directors()

        ];

        return view('Movies/create', $datas);
    }




    public function read($id = null){
        $movie = Movies::find($id);

        if (!$movie) {
            abort(404);
        }


        $datas = [
            'movie' => $movie
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
    public function select(Request $request)
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
                Session::flash('success', "Les films ont bien été supprimé. ");
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


        }

        return Redirect::route('movies.index');


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


// Requête pour create

    public function categories()
    {
        $categories = Categories::all();

        return $categories;
    }

    public function actors()
    {
        $actors = Actors::all();

        return $actors;
    }

    public function directors()
    {
        $directors = Directors::all();

        return $directors;
    }



//------------------------------------------------------------------------------------------------------------
//              STORE
//------------------------------------------------------------------------------------------------------------


    public function store(MoviesRequest $request)
    {
        $movie = new Movies();
        $movie->title           = $request->title;
        $movie->type_film       = $request->type_film;
        $movie->synopsis        = $request->synopsis;
        $movie->description     = $request->description;
        $movie->trailer         = $request->trailer;
        $movie->categories_id   = $request->categories;
        $movie->visible         = $request->visible;
        $movie->cover           = $request->cover;

        //------------------------------------------------
        // Pour les images :

        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $destinationPath = public_path() . '/uploads/movies/';
            $file->move($destinationPath, $filename);
        }

        $movie->image = asset('uploads/movies/' . $filename);

        //------------------------------------------------

        $movie->save();

        //------------------------------------------------



        if($request->moviesActors != null){
            foreach ($request->moviesActors as $actorId) {
                echo $actorId;
                DB::table('actors_movies')->insert(
                    ['actors_id' => $actorId,
                        'movies_id' => $movie->id]
                );

            }
        }


        //------------------------------------------------

        if ($request->moviesDirectors != null) {
            foreach ($request->moviesDirectors as $DirectorId) {
                echo $DirectorId;
                DB::table('directors_movies')->insert([
                        'directors_id' => $DirectorId,
                        'movies_id' => $movie->id
                    ]);
            }
        }

        //------------------------------------------------


        Session::flash('success', "Le film {$movie->title}  a bien été ajouté.");

        return Redirect::route('movies.index');
    }


//------------------------------------------------------------------------------------------------------------
//              TRASH
//------------------------------------------------------------------------------------------------------------

    public function trash(){

        $movies = Movies::onlyTrashed()->get();
        // prendre que les films qui ont été supprimés

        $datas = [
            "movies"    => $movies,
            'column' => null,
            'value' => null,
            'budgetAnnee' => $this->budgetAnnee(),
            'countMovies' => $this->countMovies(),
            'countMoviesInCover' => $this->countMoviesInCover(),
            'countMoviesTomorrow' => $this->countMoviesTomorrow(),
            'countMoviesInactive' => $this->countMoviesInactive()
        ];

        return view('Movies/index', $datas);

    }


//------------------------------------------------------------------------------------------------------------
//              RESTORE
//------------------------------------------------------------------------------------------------------------

    public function restore($id)
    {

        $movies = Movies::where('id', $id)->restore();


        return Redirect::route('movies.trash');

    }


//------------------------------------------------------------------------------------------------------------
//              COMMENTS
//------------------------------------------------------------------------------------------------------------

    public function comment(Request $request, $id)
    {
        // Si t'utilises cette méthode create, il faut ajouter dans le modèle (ici comments) le fillable
        // Ici on doit ajouter dans fillable : content, movies_id, date_created

        // On peut très bien utiliser la méthode new Comments
        // Dans ce cas, pas besoin d'ajouter fillable ect...
        Comments::create([
            'content'       => $request->input('content'),
            'movies_id'     => $id,
            'user_id'       => 2,
            'date_created'  => new \DateTime(),
            'state'         => 1
        ]);

        return Redirect::route( 'movies.read', ['id'=> $id] );
    }

}