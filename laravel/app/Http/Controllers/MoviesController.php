<?php

namespace App\Http\Controllers;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class MoviesController extends Controller
{


    public function index($annee = 2015){

        return view('Movies/index');
    }

    public function create(){

        return view('Movies/create');
    }


    public function read($id){

        return view('Movies/read', ['id' => $id]);
    }


    public function update($id){

        return view('Movies/update', ['id' => $id]);
    }

    public function delete($id){

        return redirect('movies/index', ['id' => $id]);
    }

    public function search($langue = "fr", $visibilite = 1, $duree = 2){

        return view('Movies/search', [  'langue'     => $langue,
                                        'visibilite' => $visibilite,
                                        'duree'      => $duree]);
    }





}