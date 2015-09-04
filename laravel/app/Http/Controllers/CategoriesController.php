<?php

namespace App\Http\Controllers;
use App\Model\Categories;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CategoriesController extends Controller
{


    public function getIndex(){
        $datas = [
            "categories" => Categories::all(),
            "maxMovies"  => $this->maxMovies()
        ];

        return view('Categories/index', $datas);
    }

    public function getCreate(){

        return view('Categories/create');
    }


    public function getRead(){

        return view('Categories/read');
    }


    public function getUpdate(){

        return view('Categories/update');
    }

    public function getDelete($id){
        $categorie = Categories::find($id);
        $categorie->delete();

        Session::flash('success', "La catégorie {$categorie->title} a bien été supprimé. ");

        return Redirect::route('categories.index');
    }

//-----------------------------------------------------------------------------------------------------------
//                  REQUETE
//-----------------------------------------------------------------------------------------------------------

    public function maxMovies()
    {


    }




}