<?php

namespace App\Http\Controllers;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class DirectorsController extends Controller
{


    public function index(){

        return view('Directors/index');
    }

    public function create(){

        return view('Directors/create');
    }


    public function read($id){

        return view('Directors/read', ['id' => $id]);
    }


    public function update($id){

        return view('Directors/update', ['id' => $id]);
    }

    public function delete($id){

        return redirect('directors/index', ['id' => $id]);
    }





}
