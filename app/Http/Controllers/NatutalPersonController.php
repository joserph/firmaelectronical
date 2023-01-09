<?php

namespace App\Http\Controllers;

use App\Models\NaturalPerson;
use Google\Service\DriveActivity\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NaturalPersonRequest;

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
    public function store(NaturalPersonRequest $request)
    {
        date_default_timezone_set('America/Bogota');
        // MANIPULACION DE ARCHIVOS (IMAGENES Y PDFs).
        // IMGs
        $name_cedulaFront = $this->optimizeImage($request->file('f_cedulaFront'), 'cedulaFront', $request->numerodocumento);
        $name_cedulaBack = $this->optimizeImage($request->file('f_cedulaBack'), 'cedulaBack', $request->numerodocumento);
        $name_selfie = $this->optimizeImage($request->file('f_selfie'), 'selfie', $request->numerodocumento);
        // PDFs
        if($request->file('f_copiaruc')){
            $name_copiaruc = $this->uploadPDF($request->file('f_copiaruc'), 'copiaruc', $request->numerodocumento);
        }else{
            $name_copiaruc = $request->f_copiaruc;
        }
        if($request->file('f_adicional1')){
            
            $name_adicional1 = $this->uploadPDF($request->file('f_adicional1'), 'adicional1', $request->numerodocumento);
        }else{
            $name_adicional1 = $request->f_adicional1;
        }
        if($request->file('f_adicional2')){
            $name_adicional2 = $this->uploadPDF($request->file('f_adicional2'), 'adicional2', $request->numerodocumento);
        }else{
            $name_adicional2 = $request->f_adicional2;
        }
        if($request->file('f_adicional3')){
            $name_adicional3 = $this->uploadPDF($request->file('f_adicional3'), 'adicional3', $request->numerodocumento);
        }else{
            $name_adicional3 = $request->f_adicional3;
        }
        if($request->file('f_adicional4')){
            $name_adicional4 = $this->uploadPDF($request->file('f_adicional4'), 'adicional4', $request->numerodocumento);
        }else{
            $name_adicional4 = $request->f_adicional4;
        }

        $natural_person = NaturalPerson::create([
            'tipo_solicitud'        => $request->tipo_solicitud,
            'contenedor'            => $request->contenedor,
            'nombres'               => $request->nombres,
            'apellido1'             => $request->apellido1,
            'apellido2'             => $request->apellido2,
            'tipodocumento'         => $request->tipodocumento,
            'numerodocumento'       => $request->numerodocumento,
            'coddactilar'           => $request->coddactilar,
            'ruc_personal'          => $request->ruc_personal,
            'sexo'                  => $request->sexo,
            'fecha_nacimiento'      => $request->fecha_nacimiento,
            'nacionalidad'          => $request->nacionalidad,
            'telfCelular'           => $request->telfCelular,
            'telfCelular2'          => $request->telfCelular2,
            'telfFijo'              => $request->telfFijo,
            'eMail'                 => $request->eMail,
            'eMail2'                => $request->eMail2,
            'provincia'             => $request->provincia,
            'ciudad'                => $request->ciudad,
            'direccion'             => $request->direccion,
            'vigenciafirma'         => $request->vigenciafirma,
            'express'               => $request->express,
            'f_cedulaFront'         => $name_cedulaFront,
            'f_cedulaBack'          => $name_cedulaBack,
            'f_selfie'              => $name_selfie,
            'f_copiaruc'            => $name_copiaruc,
            'f_adicional1'          => $name_adicional1,
            'f_adicional2'          => $name_adicional2,
            'f_adicional3'          => $name_adicional3,
            'f_adicional4'          => $name_adicional4,
            'mismos_datos_factu'    => $request->mismos_datos_factu,
            'fecha_deposito'        => $request->fecha_deposito,
            'num_deposito'          => $request->num_deposito,
            'nombre_banco'          => $request->nombre_banco,
            'nombre_depositante'    => $request->nombre_depositante,
            'estatus_pago'          => $request->estatus_pago,
            'nombre_partner'        => $request->nombre_partner,
            'ruc_cedula_factura'    => $request->ruc_cedula_factura,
            'nombres_factura'       => $request->nombres_factura,
            'correo_factura'        => $request->correo_factura,
            'direccion_factura'     => $request->direccion_factura,
            'telefono_factura'      => $request->telefono_factura,
            'comentarios_factura'   => $request->comentarios_factura,
            'fecha_ingreso'         => $request->fecha_ingreso,
            'fecha_envio'           => $request->fecha_envio,
            'estatus'               => $request->estatus,
            'user_id'               => $request->user_id,
            'user_update'           => $request->user_update,
        ]);

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

    public function optimizeImage($file, $name, $numerodocumento){
        $img = $file;
        // NUEVO NOMBRES
        $name_img = $name . '_' . $numerodocumento . '_' . time() . '.' . $img->guessExtension();
        // PATH
        $url_img = storage_path('app\public\img/' . $name . '/' . $name_img);
        // OPTIMIZAR IMAGEN
        $img_file =  Image::make($img);
        $img_file->resize(333, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img_file->save($url_img);
        Storage::disk('public')->get('img/' . $name . '/' . $name_img);

        return $name_img;
    }

    public function uploadPDF($file, $name, $numerodocumento){
        $pdf = $file;
        
        // NUEVO NOMBRES
        $name_pdf = $name . '_' . $numerodocumento . '_' . time() . '.' . $pdf->guessExtension();
        
        // PATH
        $url_pdf = storage_path('app\public\pdf/' . $name . '/' . $name_pdf);
       
        // SUBIR PDF
        Storage::disk('public')->get('pdf/' . $name . '/' . $name_pdf);

        return $name_pdf;
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
