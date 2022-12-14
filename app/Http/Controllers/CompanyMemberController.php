<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyMember;
use Illuminate\Support\Facades\Auth;

class CompanyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_members = CompanyMember::orderBy('fecha_ingreso', 'DESC')->paginate(15);

        return view('company-member.index', compact('company_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company-member.create');
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
            'motivo' => 'required|string',
            'unidad' => 'required|string',
            'provincia' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required',
            'nombresRL' => 'required|string',
            'apellidosRL' => 'required|string',
            'tipodocumentoRL' => 'required|in:CEDULA,PASAPORTE',
            'numerodocumentoRL' => 'required',
            'vigenciafirma' => 'required|in:7 d??as,1 a??o,2 a??os,3 a??os,4 a??os,5 a??os',
            'express' => 'required|in:Si,No',
            'f_cedulaFront' => 'required|image|mimes:png,jpg',
            'f_cedulaBack' => 'required|image|mimes:png,jpg',
            'f_selfie' => 'required|image|mimes:png,jpg',
            'f_copiaruc' => 'required|mimes:pdf',
            'f_nombramiento' => 'required|mimes:pdf',
            'f_nombramiento2' => 'nullable|mimes:pdf',
            'f_constitucion' => 'required|mimes:pdf',
            'f_documentoRL' => 'required|mimes:pdf',
            'f_autreprelegal' => 'required|mimes:pdf',
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

        $company_member = CompanyMember::create($request->all());

        if(Auth::check()){
            if($company_member)
            {
                return redirect()->route('company-member.index')->with('save', 'true');
            } 
        }else{
            if($company_member)
            {
                return redirect()->route('company-member.create')->with('save', 'true');
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
        $company_member = CompanyMember::find($id);

        return view('company-member.show', compact('company_member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_member = CompanyMember::find($id);

        return view('company-member.edit', compact('company_member'));
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
        $company_member = CompanyMember::find($id);

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
            'motivo' => 'required|string',
            'unidad' => 'required|string',
            'provincia' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required',
            'nombresRL' => 'required|string',
            'apellidosRL' => 'required|string',
            'tipodocumentoRL' => 'required|in:CEDULA,PASAPORTE',
            'numerodocumentoRL' => 'required',
            'vigenciafirma' => 'required|in:7 d??as,1 a??o,2 a??os,3 a??os,4 a??os,5 a??os',
            'express' => 'required|in:Si,No',
            'f_cedulaFront' => 'required|image|mimes:png,jpg',
            'f_cedulaBack' => 'required|image|mimes:png,jpg',
            'f_selfie' => 'required|image|mimes:png,jpg',
            'f_copiaruc' => 'required|mimes:pdf',
            'f_nombramiento' => 'required|mimes:pdf',
            'f_nombramiento2' => 'nullable|mimes:pdf',
            'f_constitucion' => 'required|mimes:pdf',
            'f_documentoRL' => 'required|mimes:pdf',
            'f_autreprelegal' => 'required|mimes:pdf',
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

        $company_member->update($request->all());

        return redirect()->route('company-member.index')->with('save', 'true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company_member = CompanyMember::find($id);
        $company_member->delete();

        return redirect()->route('company-member.index')->with('delete', 'true');
    }
}
