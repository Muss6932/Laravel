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


        ];
    }



    public function attributes(){

        return [

        ];
    }



    public function messages()
    {
        return [

        ];
    }

}