<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //<- si es false no funciona
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"=> "required",
            "protagonista"=> "required",
            "dir"=> "required",
            "year"=> "required|min:4"
            //
        ];
    }

    public function messages()
    {
        return[
            "title.required"=>"Título requerido",
            "protagonista.required"=>"Debe escribir un protagonista",
            "dir.required"=>"Debe escribir un director",
            "year.required"=>"Debe poner el año",
            "year.min"=>"Debe ser al menos 4 caracteres",
        ];
    }
}
