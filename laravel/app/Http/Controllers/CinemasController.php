<?php

namespace App\Http\Controllers;

use App\Model\Cinemas;
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
            "cinema" => Cinemas::all()
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
        $cinema = Cinemas::find($id);
        $cinema->delete();

        Session::flash('success', "Le cinéma {$cinema->title} a bien été supprimé. ");

        return Redirect::route('cinemas.index');
    }


}