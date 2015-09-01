<?php

namespace App\Http\Controllers;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CinemaController extends Controller
{


    public function getIndex(){

        return view('Cinema/index');
    }




}