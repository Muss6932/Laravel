<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActorsRequest
 * @package App\Http\Controllers\Requests
 */
class UserRequest extends FormRequest
{

    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request
     * Retourne un tableau de validation par champs
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'min:3|max:255',
            'firstname'     => 'min:3|max:255',
            'email'         => 'email',
            'password'      => 'min:6',
            'ville'         => 'min:3',
            'description'   => 'min:5|max:2000'
        ];
    }


    public function attributes(){

        return [

        ];
    }


    /**
     * Set custome message for validate errors.
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }

}