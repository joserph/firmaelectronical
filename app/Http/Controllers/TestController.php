<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Facade\FlareClient\Stacktrace\File;
use Google\Service\Dfareporting\Resource\Files;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate(10);
        
        
        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $archivo = $request->file('archivo');
        //dd($archivo);
        $name = 'test_' . time() . '.' . $archivo->guessExtension();

        $img = Image::make($archivo);

        $img->resize(333, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $fileSave = Storage::disk("google")->putFileAs("", $img, $name);

        // Extraemos el path del archivo
        $files = Storage::disk("google")->allFiles();
        foreach($files as $f)
        {
            $detail = Storage::disk("google")->getMetadata($f);
            if($fileSave == $detail['name'])
            {
                $detail2 = Storage::disk("google")->getMetadata($f);
            }
        }
        
        Test::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'archivo' => $name,
            'path' => $detail2['path']
        ]);

        return redirect()->route('tests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id);
        $files = Storage::disk("google")->allFiles();
        $url =  Storage::disk("google")->url($test->path);

        return view('tests.show', compact('test', 'url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);
        $url =  Storage::disk("google")->url($test->path);

        return view('tests.edit', compact('test', 'url'));
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
        $archivo = $request->file('archivo');
        //dd($archivo);
        $test = Test::find($id);
        
        if($archivo)
        {
            $name = 'test_' . time() . '.' . $archivo->guessExtension();
            /* ELIMINAMOS EL ARCHIVO ANTERIOR */
            Storage::disk("google")->delete($test->path);
            /* AGREGAMOS EL NUEVO ARCHIVO */
            $file = Storage::disk("google")->putFileAs("", $archivo, $name);

            // Extraemos el path del archivo
            $files = Storage::disk("google")->allFiles();
            foreach($files as $f)
            {
                $detail = Storage::disk("google")->getMetadata($f);
                if($file == $detail['name'])
                {
                    $detail2 = Storage::disk("google")->getMetadata($f);
                }
            }

            $test->update([
                'titulo' => $request->titulo,
                'contenido' => $request->contenido,
                'archivo' => $name,
                'path' => $detail2['path']
            ]);
        }else{
            $test->update([
                'titulo' => $request->titulo,
                'contenido' => $request->contenido,
            ]);
        }

        return redirect()->route('tests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        // Eliminamos en Google drive
        Storage::disk("google")->delete($test->path);
        $test->delete();

        return redirect()->route('tests.index');
        
    }
}
