<?php

namespace App\Http\Controllers;
use App\Model\Directors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class DirectorsController extends Controller
{


    public function index(){
        $datas = [
            "directors" => Directors::all()
        ];

        return view('Directors/index', $datas);
    }

    public function create(){

        return view('Directors/create');
    }


    public function read($id = null){
        $datas = [
            "director" => Directors::find($id)
        ];

        return view('Directors/read', $datas);
    }


    public function update($id){

        return view('Directors/update', ['id' => $id]);
    }

    public function delete($id){
        $director = Directors::find($id);
        $director->delete();

        Session::flash('success', "Le réalisateur {$director->firstname} {$director->lastname} a bien été supprimé. ");


        return Redirect::route('directors.index');
    }





}
