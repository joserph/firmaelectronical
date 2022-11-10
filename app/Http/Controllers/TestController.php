<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Facade\FlareClient\Stacktrace\File;
use Google\Service\Dfareporting\Resource\Files;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

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
        $name = 'test_' . time() . '.' . $archivo->guessExtension();

        /***** */
        // $filename = 'test_' . time() . '.' . $archivo->guessExtension();
        // $filePath = public_path($filename);
        // //dd($filePath);
        // $fileData = File::get($filePath);

        //Storage::disk("google")->put($name, $archivo);
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
        //dd($detail2);

        //$name = $archivo->store('', 'google');
        //dd($name);
        //$request->file('archivo')->store('', 'google');
        //return 'File was saved to Google Drive';

        /******* */
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
        // foreach($files as $f)
        // {
        //     $detail = Storage::disk("google")->getMetadata($f);
        //     if($test->archivo == $detail['name'])
        //     {
        //         
        //         $detail2 = Storage::disk("google")->getMetadata($f);
        //     }
        // }
        $url =  Storage::disk("google")->url($test->path);
        //dd($detail2);
        // $path = explode("/", $files);
        // $url = Storage::disk("google")->url($path[0]);
        // $meta = Storage::disk("google")->getMetadata($path[0]);
        // dd('https://drive.google.com/drive/u/0/folders/' . $files . '&export=media');

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
        //
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
        //
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
