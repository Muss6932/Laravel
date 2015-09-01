<?php

namespace App\Http\Controllers;
use App\Model\Actors;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class ActorsController extends Controller
{


    public function index(){
        $datas = [
            "actors" => Actors::all()
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