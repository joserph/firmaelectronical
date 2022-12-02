<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NaturalPersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_solicitud' => 'required',
            'contenedor' => 'required',
            'nombres' => 'required',
            'apellido1' => 'required',
            'tipodocumento' => 'required',
            'numerodocumento' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'nacionalidad' => 'required',
            'telfCelular' => 'required',
            'telfCelular2' => 'required',
            'eMail' => 'required',
            'eMail2' => 'required',
            'provincia' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'vigenciafirma' => 'required',
            'express' => 'required',
        ];
    }
}
