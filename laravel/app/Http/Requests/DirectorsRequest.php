<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DirectorsRequest
 * @package App\Http\Requests
 */
class DirectorsRequest extends FormRequest
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
            'firstname'     => 'required|min:3|max:50',
            'lastname'      => 'required|min:3|max:50',
            'dob'           => 'required|date_format:m/d/Y|before:now',
            'image'         => 'image',
            'biography'     => 'required|min:10|max:5000'
        ];
    }


    public function attributes(){

        return [
            'firstname'     => 'prénom',
            'lastname'      => 'nom',
            'dob'           => 'date de naissance',
            'biography'     => 'biographie'
        ];
    }


    /**
     * Set custome message for validate errors.
     * @return array
     */
    public function messages()
    {
        return [
            'required'      => "Le champ ':attribute' est obligatoire.",
            'date_format'   => "La date n'est pas au bon format",
            'before'        => "La date doit être inférieur à aujourd'hui",
            'image'         => "Le format du fichier n'est pas valide"
        ];
    }

}