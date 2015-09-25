<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CinemasRequest
 * @package App\Http\Requests
 */
class SessionsRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'movies'        => 'required|numeric',
            'dateSession'   => 'required|date_format:d/m/Y|after:now',
            'heureSession'  => 'required|date_format:"H:i',


        ];
    }


    public function attributes()
    {

        return [
            'movies' => 'Film',
            'dateSession' => 'Date',
            'heureSession' => 'Heure',

        ];
    }


    public function messages()
    {
        return [
            'required' => "Le champ ':attribute' est obligatoire.",

        ];
    }

}