<?php

namespace App\Http\Controllers;
use App\Http\Requests\ActorsRequest;
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

    /**
     * ActorsRequest est une classe de validation de formulaire
     * Cette classe est liée à la requête, c'est une classe FormRequest
     * Le mécanisme de validation de formulaire dans Laravel
     * valide le formulaire et fais une redirection vers create
     * quand mon formulaire contient des erreurs sinon rentre dans l'action store()
     */
    public function store(ActorsRequest $request)
    {
        // J'enregistre un nouvel acteur dès que mon
        // formulaire est valide (0 erreur)
        $actor = new Actors();
        $actor->firstname       = $request->firstname;
        $actor->lastname        = $request->lastname;
        $actor->dob             = $request->dob;
        $actor->nationality     = $request->nationality;
        $actor->roles           = $request->roles;
        $actor->recompenses     = $request->recompenses;
        $actor->biography       = $request->biography;

        //------------------------------------------------
        // Pour les images :

        $filename = ""; // define null
        if($request->hasFile('image'))
        {
            // Save the name of file upload
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            // Move upload
            $destinationPath = public_path() . '/uploads/actors/';  // path vers public
            $file->move($destinationPath, $filename);   // move the image file into public/upload/actor
        }

        $actor->image = asset('uploads/actors/'.$filename);

        //------------------------------------------------


        $actor->save();

        Session::flash('success' , "L'acteur {$actor->firsname} {$actor->lastname} a bien été ajouté.");

        return Redirect::route('actors.index');
    }




}