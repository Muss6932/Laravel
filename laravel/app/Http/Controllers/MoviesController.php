<?php

namespace App\Http\Controllers;
use App\Model\Movies;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class MoviesController extends Controller
{


    public function index(){
        $datas = [
            'movies' => Movies::all()
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

        return view('Movies/update', ['id' => $id]);
    }

    public function delete($id){
        $movie = Movies::find($id);
        $movie->delete();

        return Redirect::route('movies.index');
    }

    public function search($langue = "fr", $visibilite = 1, $duree = 2){

        return view('Movies/search', [  'langue'     => $langue,
                                        'visibilite' => $visibilite,
                                        'duree'      => $duree]);
    }





}