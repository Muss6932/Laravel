<?php

namespace App\Http\Controllers;
use App\Model\Actors;
use App\Model\Categories;
use App\Model\Cinema;
use App\Model\Comments;
use App\Model\Directors;
use App\Model\Movies;
use App\Model\Recommandations;
use App\Model\Tasks;
use App\Model\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{

    public function datas(){


        // MONGO
//        $m = new \MongoClient();        // connexion
//        $db = $m->selectDB('laravel');  // choix de la base de donnée
//        $collection = new \MongoCollection($db, 'unicorns');    // choix de la collection
//
//        // recherche des fruits
//        $find = array('name' => 'Horny');
//
//        $result = $collection->find($find);
//
//        foreach ($result as $document){
//            dump($document);
//        }
//
//        exit();


        $datas = [
            'ageMoyen' => $this->ageMoyen()[0],
            'lyon' => $this->city('lyon'),
            'birmingham' => $this->city('birmingham'),
            'newyork' => $this->city('new york'),
            'comments' => $this->comments(),
            'tauxCommentairesActifs' => $this->tauxCommentairesActifs(),
            'tauxFilmsFavoris' => $this->tauxFilmsFavoris(),
            'tauxFilmsDiffuses' => $this->tauxFilmsDiffuses(),
            'categories' => $this->categories(),
            'seanceavenir' => $this->seanceAVenir(),

        ];

        return $datas;
    }



    public function welcome(){

        return view('Pages/welcome', $this->datas());
    }







    /**
     * Page 'Contact'
     */
    public function contact(){

        return view('Pages/Contact');
    }

    /**
     * Page 'Mentions Légales'
     */
    public function mention(){

        return view('Pages/mt');
    }

    /**
     * Page 'FAQ'
     */
    public function faq(){

        return view('Pages/faq');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // Récupere de manière sécurisé la valeur de mon input
        // dont le name est 'title
        $title = $request->input('title');
        $language = $request->input('language');
        $bo = $request->input('bo');
        $cover = $request->input('checkbox');

        dump($title);
        dump($language);
        dump($bo);
        dump($cover);

        return view('Pages/search');
    }


    public function addMovie(Request $request){



        $validator = Validator::make(
            array(
                'title'       => $request->input('title'),
                'categories'  => $request->input('categories'),
                'synopsis'    => $request->input('synopsis')
            ),
            array(
                'title'      => 'required|max:255',
                'categories' => 'required|numeric',
                'synopsis'   => 'min:6'
            )
        );


        if ($validator->fails() ){

            return view('Pages/welcome', $this->datas());


        } else {
            $movie = new Movies();

            $movie->title           = $request->input('title');
            $movie->categories_id   = $request->input('categories');
            $movie->synopsis        = $request->input('synopsis');

//        dump($movie);exit();

            $movie->save();

            return view('Pages/welcome', $this->datas());
        }


    }


//-------------------------------------------------------------------------------------------------
//          REQUETES
//-------------------------------------------------------------------------------------------------


    public function ageMoyen() {
        $ageMoyen = DB::select('SELECT ROUND( AVG((TIMESTAMPDIFF(YEAR, dob, NOW())) )) AS ageMoyen FROM actors');
//        dump($ageMoyen);
//        exit();

        return$ageMoyen;
    }

    public function city($a) {
        $city = Actors::where('city', $a)->count();

       return $city;
    }

    public function comments() {
        $comments = Comments::all();

        return $comments;
    }

    public function tauxCommentairesActifs() {
        $nbcomments = Comments::all()->count();
        $nbactifs = Comments::where('state','2')->count();

        $tauxCommentairesActifs = round($nbactifs * 100 / $nbcomments);
//        dump($tauxCommentairesActifs);exit();

        return $tauxCommentairesActifs;
    }

    public function tauxFilmsFavoris() {
        $nbfilms = Movies::all()->count();
        $filmFavoris = DB::select('SELECT count(distinct(movies_id)) as nombre FROM user_favoris');

        $taux = round($filmFavoris[0]->nombre * 100 / $nbfilms);

        return $taux;
    }

    public function tauxFilmsDiffuses() {
        $nbfilms = Movies::all()->count();
        $filmDiffuses = DB::select('select count(distinct(movies_id)) as nombre from sessions where date_session < now()');

        $taux = round($filmDiffuses[0]->nombre * 100 / $nbfilms);

        return $taux;
    }

    public function categories(){
        $categories = Categories::all();

        return $categories;
    }



//-------- sessions



    public function seanceAVenir(){
        $filmavenir = DB::select('SELECT movies.id as id, movies.title as movie, cinema.title as cinema, sessions.date_session as date
                                  FROM sessions
                                  INNER JOIN movies ON movies.id = sessions.movies_id
                                  INNER JOIN cinema ON cinema.id = sessions.cinema_id
                                  WHERE sessions.date_session > now()
                                  ORDER BY sessions.date_session');

        return $filmavenir;
    }



    public function ajax(){
        $datas = [
            'seanceavenir' => $this->seanceAVenir(),
        ];

        return view('Pages/ajax', $datas);
    }



//---------------------------------------------------------------------------------------------------------
//              WELCOME ADVANCED
//---------------------------------------------------------------------------------------------------------

    public function welcomeAdvanced()
    {
        $datas = [
            'cinemas'           => Cinema::all(),
            'recommandations'   => Recommandations::all(),
            'users'             => $this->recentUser(),
            'tasks'             => $this->tasks(),
            'actorpercity'      => $this->actorpercity(),
            'actorAge'          => $this->actorAge(),
            'directors'         => $this->directors(),
        ];

        return view('Pages/welcomeAdvanced', $datas);
    }


    public function recentUser(){
        $recentUser = Users::orderBy('date_inscription','desc')
                            ->take(10)
                            ->get();

        return $recentUser;
    }

    public function tasks(){
        $tasks = Tasks::all();

        return $tasks;
    }


    public function selectTasks(Request $request)
    {

        $tasks  = $request->input('selectTasks');

        if (count($tasks) == 0) {
            Session::flash('warning', "Aucune tache sélectionnée");

        } else {
            foreach ($tasks as $id) {
                $tasks = Tasks::find($id);
                $tasks->delete();
            }
            Session::flash('success', "Les taches ont été supprimé. ");

        }

        return Redirect::route('welcome.advanced');
    }



    public function actorpercity(){
        $actorpercity = DB::select('SELECT city, COUNT(id) as nombre
                                    FROM actors
                                    GROUP BY city
                                    HAVING COUNT(id) > 1');

        return $actorpercity;
    }


    public function actorAge(){
        $actorAge = DB::select('SELECT ROUND( (TIMESTAMPDIFF(YEAR, dob, NOW())) ) AS age FROM actors');

        return $actorAge;
    }

    public function directors(){
//        DB::connection()->enableQueryLog();

        // mysql native
       /* $directors = DB::select('SELECT directors.id
                                 FROM directors
                                 INNER JOIN directors_movies ON directors_movies.directors_id = directors.id
                                 INNER JOIN movies ON movies.id = directors_movies.movies_id
                                 GROUP BY directors.id
                                 ORDER BY count(movies.id) DESC
                                 LIMIT 4');*/

        // query builder
//        $directors = DB::table('directors')
//            ->join('directors_movies', 'directors.id', '=', 'directors_movies.directors_id')
//            ->join('movies', 'movies.id', '=', 'directors_movies.movies_id')
//            ->select('directors.id')
//            ->groupBy('directors.id')
//            ->orderBy(DB::raw("COUNT(movies.id)"), 'desc')
//            ->take(4)->get();

        $directors =  Directors::has('movies')
            ->join('directors_movies', 'directors.id', '=', 'directors_movies.directors_id')
            ->groupBy('directors.id')
            ->orderBy(DB::raw("COUNT(directors_movies.movies_id)"), 'desc')
            ->take(4)
            ->get();

//        exit(dump($directors));

//        $bestDirectors = array();
//        foreach ($directors as $director){
//            array_push($bestDirectors, Directors::find($director->id));
//        }


        return $directors;
    }






//---------------------------------------------------------------------------------------------------------
//              WELCOME PROFESSIONAL
//---------------------------------------------------------------------------------------------------------

    public function welcomeProfessional()
    {
        $datas = [
            'bestcinema'        => $this->bestcinema(),
            'sumcomments'       => $this->sumcomments(),
            'cinemasmovies'     => $this->cinemasmovies(),
            'categories'        => $this->categories(),
            'summovies'         => Movies::all()->count(),
            'bestcats'         => $this->bestcat()
        ];

        return view('Pages/welcomeProfessional', $datas);
    }







    public function bestcat()
    {
        $query = DB::select('   SELECT SUM(budget) as budg , categories_id, categories.title
                                FROM movies
                                JOIN categories ON categories.id = movies.categories_id
                                GROUP BY categories_id
                                ORDER BY SUM(budget) DESC
                                LIMIT 4');

        return $query;
    }


//    public function fourBestCategories() {
//        $fourBestCategories = DB::select('
//        SELECT categories.id, categories.title, SUM(movies.budget) as sommeBudget, COUNT(movies.id) as nombredefilm
//        FROM categories
//        INNER JOIN movies ON movies.categories_id = categories.id
//        GROUP BY categories.id
//        ORDER BY sum(movies.budget) DESC
//        LIMIT 4');
//
//        return $fourBestCategories;
//    }
//
//    public function bestCategoriesMovies() {
//
//        $id_cat = [];
//
//
//        foreach ( $this->fourBestCategories() as $categorie) {
//            array_push($id_cat, $categorie->id);
//        }
//
//        $categories = Categories::find($id_cat);
//
//        return $categories;
//    }


// -------------------- REPARTITION DU NOMBRE DE COMMENTAIRES PAR CINEMA

    public function bestcinema() {
//        $cinemas = Cinema::has('sessions')
//            ->join('sessions', 'sessions.cinema_id', '=', 'cinema.id')
//            ->groupBy('cinema.id')
//            ->orderBy(DB::raw("COUNT(sessions.movies_id)"), 'desc')
//            ->take(6)
//            ->get();

        $cine = DB::select('SELECT cinema.title, COUNT(comments.id) as nbcomments, cinema.id
                            FROM cinema
                            LEFT JOIN sessions
                            ON cinema.id = sessions.cinema_id
                            LEFT JOIN movies
                            ON sessions.movies_id = movies.id
                            LEFT JOIN comments
                            ON comments.movies_id = movies.id
                            GROUP BY cinema.id
                            ORDER BY COUNT(comments.id) DESC
                            LIMIT 6');

        return $cine;
    }

    public function sumcomments() {
        $sumcomments = $this->comments()->count();

        return $sumcomments;
    }

    public function cinemasmovies() {

        $tab = [];
        foreach ($this->bestcinema() as $cine) {
            array_push($tab,$cine->id);
        };

        $cinemasmovies = Cinema::find($tab);

//        exit(dump($cinemasmovies));

        return $cinemasmovies;
    }


// -------------------- REPARTITION DES FILMS PAR CATEGORIES












} //FIN CONTROLLER
