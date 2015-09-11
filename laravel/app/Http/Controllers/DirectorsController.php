<?php

namespace App\Http\Controllers;
use App\Http\Requests\DirectorsRequest;
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

    public function store(DirectorsRequest $request)
    {
        // J'enregistre un nouvel acteur dès que mon
        // formulaire est valide (0 erreur)
        $director = new Directors();
        $director->firstname = $request->firstname;
        $director->lastname = $request->lastname;
        $director->dob = $request->dob;
        $director->image = $request->image;
        $director->biography = $request->biography;

        //-------------------------------------

        $filename = "";

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $destinationPath = public_path() . '/uploads/directors/';
            $file->move($destinationPath, $filename);
        }

        $director->image = asset('uploads/directors/' . $filename);

        //-------------------------------------


        $director->save();

        Session::flash('success', "Le réalisateur {$director->firsname} {$director->lastname} a bien été ajouté.");

        return Redirect::route('directors.index');
    }



}
