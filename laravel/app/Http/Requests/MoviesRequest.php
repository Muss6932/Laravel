<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DirectorsRequest
 * @package App\Http\Requests
 */
class MoviesRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'             => 'required|min:3|max:50',
            'type_film'         => 'min:3',
            'synopsis'          => 'min:10|max:300',
            'description'       => 'min:10|max:5000',
            'image'             => 'image',
            'trailer'           => array('regex:youtube|dailymotion|vimeo'),
            'categories'        => 'required|numeric',
            'languages'         => array('regex:/^(en|fr)$/'),
            'moviesActors'      => 'array',
            'moviesDirectors'   => 'array',
            'visible'           => array('regex:/^(1|0)$/'),
            'cover'             => array('regex:/^(1|0)$/')

        ];
    }



    public function attributes(){

        return [
            'title'             => 'Titre',
            'type_film'         => 'Type',
            'categories'        => 'Catégorie',
            'visible'           => 'Visibilité',
            'cover'             => 'Couverture'
        ];
    }



    public function messages()
    {
        return [
            'required'      => "Le champ ':attribute' est obligatoire.",

        ];
    }

}