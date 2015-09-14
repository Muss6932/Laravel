<?php

namespace App\Http\Controllers;
use App\Model\Actors;
use App\Model\Categories;
use App\Model\Comments;
use App\Model\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{

    public function datas(){
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
            'seanceavenir' => $this->seanceAVenir()[0]->nombre,
            'a' => $this->a(),

        ];

        return $datas;
    }


    /**
     * Page 'Contact'
     */
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
            $message = $validator->messages();
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
        $nbseanceavenir = DB::select('select count(distinct(movies_id)) as nombre from sessions where date_session > now()');

        return $nbseanceavenir;
    }

    public function a(){
        $filmavenir = DB::select('SELECT movies.title, cinema.title, sessions.date_session
                                  FROM sessions
                                  INNER JOIN movies ON movies.id = sessions.movies_id
                                  INNER JOIN cinema ON cinema.id = sessions.cinema_id
                                  WHERE sessions.date_session > now()');

        dump($filmavenir);
        exit();
    }










} //FIN CONTROLLER
