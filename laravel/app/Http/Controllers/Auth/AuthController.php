<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Encryption\DecryptException;


class AuthController extends Controller
{

    protected $loginPath = '/auth/login';

    protected $redirectPath = '/admin';

    protected $redirectAfterLogout = '/auth/login';

    /**
     * Redirection si je suis interdit
     * @var string
     */
    protected $redirectTo = '/admin/login';


    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout','update', 'maj']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {


        return Validator::make($data, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:administrators',
            'password'  => 'required|confirmed|min:6',
            'url'       => 'url|active_url'
        ], [
            'name.required'     => "* Veuillez préciser votre nom.",
            'email.required'    => "* Veuillez préciser votre email.",
            'password.required' => "* Le mot de passe est obligatoire.",
            'password.confirmed'=> "* Les mots de passe ne sont pas identiques.",
            'password.min'      => "* Le mot de passe doit contenir au minimum 6 caractères."
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'firstname' => $data['firstname'],
            'ville' => $data['ville'],
            'description' => $data['description'],
            'image' => $data['image'],

        ]);
    }

    /**
     * Show the application login form
     *
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {

        return view('Authentification/login');
    }



    /**
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {

        return view('Authentification/register');
    }


    public function update()
    {


        return view('Authentification/update');
    }







    public function maj(UserRequest $request)
    {

        dump($request->all());
        exit();
        $user = Auth::user();

        $user->name = $request->name;
        $user->firstname = $request->firstname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->ville = $request->ville;
        $user->image = $request->image;
        $user->description = $request->description;

        $user->save();



    }




}
