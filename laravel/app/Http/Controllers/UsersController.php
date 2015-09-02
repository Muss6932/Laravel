<?php

namespace App\Http\Controllers;
use App\Model\Users;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{

    public function getIndex() {
        $datas = [
            'users' => Users::all()
        ];

        return view('Users/index', $datas);
    }

    public function search($visible = 1, $ville = null, $zipcode = null){

        return view('Users/search', [   'visible'     => $visible,
                                        'ville'       => $ville,
                                        'zipcode'     => $zipcode]);
    }





}