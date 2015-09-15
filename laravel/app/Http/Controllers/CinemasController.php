<?php

namespace App\Http\Controllers;

use App\Http\Requests\CinemasRequest;
use App\Http\Requests\SessionsRequest;
use App\Model\Cinema;
use App\Model\Movies;
use App\Model\Sessions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class CinemasController
 * @package App\Http\Controllers
 */
class CinemasController extends Controller
{


    public function getIndex()
    {
        $datas = [
            "cinema" => Cinema::all()
        ];

        return view('Cinemas/index', $datas);
    }

    public function getCreate()
    {

        return view('Cinemas/create');
    }


    public function getRead()
    {

        return view('Cinemas/read');
    }


    public function getUpdate()
    {

        return view('Cinemas/update');
    }

    public function getDelete($id)
    {
        $cinema = Cinema::find($id);
        $cinema->delete();

        Session::flash('success', "Le cinéma {$cinema->title} a bien été supprimé. ");

        return Redirect::route('cinemas.index');
    }



    public function getSeance($id)
    {
        $datas = [
            'cinema' => Cinema::find($id),
            'movies' => $this->movies()
        ];

        return view('Cinemas/seance', $datas);
    }



    public function movies()
    {
        $movies = Movies::all();

        return $movies;
    }



    public function store($id, SessionsRequest $request)
    {
//        dump($request->all());
//        exit();


        $session = new Sessions();

        $session->movies_id     = $request->movies;
        $session->cinema_id     = $id;
        $session->date_session  = date_create_from_format('d/m/Y H:i', $request->dateSession . " " . $request->heureSession);



        $session->save();


        Session::flash('success', "La séance a été ajouté.");

        return Redirect::route('cinemas.index');
    }

}