<?php

namespace App\Http\Controllers;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CategoriesController extends Controller
{


    public function getIndex(){

        return view('Categories/index');
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

    public function getDelete(){

        return redirect('categories/index');
    }





}