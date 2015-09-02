<?php

namespace App\Http\Controllers;
use App\Model\Actors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class ActorsController extends Controller
{


    public function index(){
        $datas = [
            "actors" => Actors::all() /*récupérer tout les acteurs*/
        ];

        return view('Actors/index', $datas);
    }

    public function create(){

        return view('Actors/create');
    }


    public function read($id = null){
        $datas = [
            'actor' => Actors::find($id) /*trouver un acteur par son id*/
        ];

        return view('Actors/read', $datas);
    }


    public function update($id){

        return view('Actors/update', ['id' => $id]);
    }

    public function delete($id){
        // Je supprime un acteur
        $actor = Actors::find($id);
        $actor->delete();

        // J'écris en session un message Flash
        Session::flash('success', "L'acteur {$actor->firstname} {$actor->lastname} a bien été supprimé. ");

        // Je redirige
        return Redirect::route('actors.index');
    }





}