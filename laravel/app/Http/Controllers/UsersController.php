<?php

namespace App\Http\Controllers;
use App\Model\Users;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    public function getCreate()
    {

        return view('Users/create');
    }


    public function getRead()
    {

        return view('Users/read');
    }


    public function getUpdate()
    {

        return view('Users/update');
    }

    public function getDelete($id)
    {
        $user = Users::find($id);
        $user->delete();

        Session::flash('success', "L'utilisateur {$user->username} a bien été supprimé. ");

        return Redirect::route('users.index');
    }

    public function search($visible = 1, $ville = null, $zipcode = null){

        return view('Users/search', [   'visible'     => $visible,
                                        'ville'       => $ville,
                                        'zipcode'     => $zipcode]);
    }





}