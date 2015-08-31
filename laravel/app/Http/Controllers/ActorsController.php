<?php

namespace App\Http\Controllers;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class ActorsController extends Controller
{


    public function index(){
        $datas = [
            'acteurs' => [
                ['nom' => 'Bob'     , 'prenom' => 'Marley'  , 'age' => 25],
                ['nom' => 'Cage'    , 'prenom' => 'Nicolas' , 'age' => 42],
                ['nom' => 'Russel'  , 'prenom' => 'Crow'    , 'age' => 37]
            ],
            'title' => "Liste des acteurs",
            'noms'  => [ 'Bob', 'Nicolas', 'Russel' ],
            'age'   => [   25 ,    42    ,    37    ],
            'localite' => [
                'Paris' => [ 'Bob' , 'Russel'],
                'Lyon'  => [ 'Nicolas' ]
            ]
        ];

        return view('Actors/index', $datas);
    }

    public function create(){

        return view('Actors/create');
    }


    public function read($id){

        return view('Actors/read', ['id' => $id]);
    }


    public function update($id){

        return view('Actors/update', ['id' => $id]);
    }

    public function delete($id){

        return redirect('actors/index', ['id' => $id]);
    }





}