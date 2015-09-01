<?php

namespace App\Http\Controllers;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{

    public function getIndex() {

        return view('Users/index');
    }

    public function search($visible = 1, $ville = null, $zipcode = null){

        return view('Users/search', [   'visible'     => $visible,
                                        'ville'       => $ville,
                                        'zipcode'     => $zipcode]);
    }





}