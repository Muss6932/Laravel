<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CinemasRequest
 * @package App\Http\Requests
 */
class CinemasRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'movies'            => 'required|min:3|max:50',
            'moviesActors'      => 'required|array',
            'moviesDirectors'   => 'required|array',


        ];
    }



    public function attributes(){

        return [
            'movies'             => 'Film',

        ];
    }



    public function messages()
    {
        return [
            'required'      => "Le champ ':attribute' est obligatoire.",

        ];
    }

}