<?php

namespace App\Http\Controllers;

use App\Models\NaturalPerson;
use Google\Service\DriveActivity\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NatutalPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $natural_persons = NaturalPerson::orderBy('fecha_ingreso', 'DESC')->paginate(15);

        return view('natural-person.index', compact('natural_persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('natural-person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $request->validate([
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
            'telfCelular' => 'required|numeric',
            'telfCelular2' => 'required|numeric',
            'telfFijo' => 'nullable',
            'eMail' => 'required|email',
            'eMail2' => 'required|email',
            'provincia' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required',
            'vigenciafirma' => 'required|in:7 días,1 año,2 años,3 años,4 años,5 años',
            'express' => 'required|in:Si,No',
            'f_cedulaFront' => 'required|image|mimes:png,jpg',
            'f_cedulaBack' => 'required|image|mimes:png,jpg',
            'f_selfie' => 'required|image|mimes:png,jpg',
            'f_copiaruc' => 'nullable|mimes:pdf',
            'f_adicional1' => 'max:4000',
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
        ]);

        $natural_person = NaturalPerson::create($request->all());

        if(Auth::check()){
            if($natural_person)
            {
                return redirect()->route('natural-person.index')->with('save', 'true');
            } 
        }else{
            if($natural_person)
            {
                return redirect()->route('natural-person.create')->with('save', 'true');
            } 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $natural_person = NaturalPerson::find($id);
        //dd($natural_person);
        return view('natural-person.show', compact('natural_person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $natural_person = NaturalPerson::find($id);

        return view('natural-person.edit', compact('natural_person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $natural_person = NaturalPerson::find($id);
        date_default_timezone_set('America/Bogota');
        $request->validate([
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
            'telfCelular' => 'required|numeric',
            'telfCelular2' => 'required|numeric',
            'telfFijo' => 'nullable',
            'eMail' => 'required|email',
            'eMail2' => 'required|email',
            'provincia' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required',
            'vigenciafirma' => 'required|in:7 días,1 año,2 años,3 años,4 años,5 años',
            'express' => 'required|in:Si,No',
            'f_cedulaFront' => 'required|image|mimes:png,jpg',
            'f_cedulaBack' => 'required|image|mimes:png,jpg',
            'f_selfie' => 'required|image|mimes:png,jpg',
            'f_copiaruc' => 'nullable|mimes:pdf',
            'f_adicional1' => 'max:4000',
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
        ]);

        $natural_person->update($request->all());
        
        return redirect()->route('natural-person.index')->with('save', 'true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $natural_person = NaturalPerson::find($id);
        $natural_person->delete();

        return redirect()->route('natural-person.index')->with('delete', 'true');
    }
}
