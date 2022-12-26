<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LegalRepresentative;
use Illuminate\Support\Facades\Auth;

class LegalRepresentativeControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legal_representatives = LegalRepresentative::orderBy('fecha_ingreso', 'DESC')->paginate(15);

        return view('legal-representative.index', compact('legal_representatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('legal-representative.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_solicitud' => 'required',
            'contenedor' => 'required|in:0,1,2',
            'nombres' => 'required|string',
            'apellido1' => 'required|string',
            'apellido2' => 'string|nullable',
            'tipodocumento' => 'required|in:CEDULA,PASAPORTE',
            'numerodocumento' => 'required',
            'coddactilar' => 'nullable|alpha_num',
            //'ruc_personal' => 'nullable|numeric',
            'sexo' => 'required|in:HOMBRE,MUJER',
            'fecha_nacimiento' => 'required|date',
            'nacionalidad' => 'required|string',
            'telfCelular' => 'required|numeric',
            'telfCelular2' => 'required|numeric',
            'telfFijo' => 'nullable',
            'eMail' => 'required|email',
            'eMail2' => 'required|email',
            'empresa' => 'required',
            'ruc_empresa' => 'required|numeric',
            'cargo' => 'required|string',
            'provincia' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required',
            'vigenciafirma' => 'required|in:7 días,1 año,2 años,3 años,4 años,5 años',
            'express' => 'required|in:Si,No',
            'f_cedulaFront' => 'required|image|mimes:png,jpg',
            'f_cedulaBack' => 'required|image|mimes:png,jpg',
            'f_selfie' => 'required|image|mimes:png,jpg',
            'f_copiaruc' => 'required|mimes:pdf',
            'f_nombramiento' => 'required|mimes:pdf',
            'f_nombramiento2' => 'nullable|mimes:pdf',
            'f_constitucion' => 'required|mimes:pdf',
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

        $legal_representative = LegalRepresentative::create($request->all());

        if(Auth::check()){
            if($legal_representative)
            {
                return redirect()->route('legal-representative.index')->with('save', 'true');
            } 
        }else{
            if($legal_representative)
            {
                return redirect()->route('legal-representative.create')->with('save', 'true');
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
        $legal_representative = LegalRepresentative::find($id);

        return view('legal-representative.show', compact('legal_representative'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legal_representative = LegalRepresentative::find($id);

        return view('legal-representative.edit', compact('legal_representative'));
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
        $legal_representative = LegalRepresentative::find($id);

        $request->validate([
            'tipo_solicitud' => 'required',
            'contenedor' => 'required|in:0,1,2',
            'nombres' => 'required|string',
            'apellido1' => 'required|string',
            'apellido2' => 'string|nullable',
            'tipodocumento' => 'required|in:CEDULA,PASAPORTE',
            'numerodocumento' => 'required',
            'coddactilar' => 'nullable|alpha_num',
            //'ruc_personal' => 'nullable|numeric',
            'sexo' => 'required|in:HOMBRE,MUJER',
            'fecha_nacimiento' => 'required|date',
            'nacionalidad' => 'required|string',
            'telfCelular' => 'required|numeric',
            'telfCelular2' => 'required|numeric',
            'telfFijo' => 'nullable',
            'eMail' => 'required|email',
            'eMail2' => 'required|email',
            'empresa' => 'required',
            'ruc_empresa' => 'required|numeric',
            'cargo' => 'required|string',
            'provincia' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required',
            'vigenciafirma' => 'required|in:7 días,1 año,2 años,3 años,4 años,5 años',
            'express' => 'required|in:Si,No',
            'f_cedulaFront' => 'required|image|mimes:png,jpg',
            'f_cedulaBack' => 'required|image|mimes:png,jpg',
            'f_selfie' => 'required|image|mimes:png,jpg',
            'f_copiaruc' => 'required|mimes:pdf',
            'f_nombramiento' => 'required|mimes:pdf',
            'f_nombramiento2' => 'nullable|mimes:pdf',
            'f_constitucion' => 'required|mimes:pdf',
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

        $legal_representative->update($request->all());

        return redirect()->route('legal-representative.index')->with('save', 'true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $legal_representative = LegalRepresentative::find($id);
        $legal_representative->delete();

        return redirect()->route('legal-representative.index')->with('delete', 'true');
    }
}
