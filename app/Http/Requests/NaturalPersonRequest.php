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
            'contenedor' => 'required|in:0,1,2',
            'nombres' => 'required|string',
            'apellido1' => 'required|string',
            'apellido2' => 'string|nullable',
            'tipodocumento' => 'required|in:CEDULA,PASAPORTE',
            'numerodocumento' => 'required',
            'coddactilar' => 'nullable|alpha_num',
            'ruc_personal' => 'nullable|numeric',
            'sexo' => 'required|in:HOMBRE,MUJER',
            'fecha_nacimiento' => 'required|date',
            'nacionalidad' => 'required|string',
            'telfCelular' => 'required|numeric|max:9',
            'telfCelular2' => 'required|numeric',
            'telfFijo' => 'nullable',
            'eMail' => 'required|email',
            'eMail2' => 'required|email',
            'provincia' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required|alpha_num',
            'vigenciafirma' => 'required|in:7 días,1 año,2 años,3 años,4 años,5 años',
            'express' => 'required|in:Si,No',
            'f_cedulaFront' => 'required|image|mimes:png,jpg',
            'f_cedulaBack' => 'required|image|mimes:png,jpg',
            'f_selfie' => 'required|image|mimes:png,jpg',
            'f_copiaruc' => 'nullable|mimes:pdf',
            'f_adicional1' => 'required|max:4000',
            'f_adicional2' => 'nullable',
            'f_adicional3' => 'nullable',
            'f_adicional4' => 'nullable',
            'mismos_datos_factu' => 'required|in:Si,No',
            'fecha_deposito' => 'nullable|date',
            'num_deposito' => 'nullable|alpha_num',
            'nombre_banco' => 'nullable|string',
            'nombre_depositante' => 'nullable|string',
            'estatus_pago' => 'nullable',
            'nombre_partner' => 'nullable|alpha_num',
            'ruc_cedula_factura' => 'nullable|numeric',
            'nombres_factura' => 'nullable|string',
            'correo_factura' => 'nullable|email',
            'direccion_factura' => 'nullable|alpha_num',
            'telefono_factura' => 'nullable|numeric',
            'comentarios_factura' => 'nullable|alpha_num',
            'fecha_ingreso' => 'nullable|date',
            'fecha_envio' => 'nullable|date',
            'estatus' => 'nullable',
        ];
    }
}
