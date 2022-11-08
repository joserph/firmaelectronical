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
        //$name = 'test_' . time() . '.' . $archivo->guessExtension();

        /***** */
        // $filename = 'test_' . time() . '.' . $archivo->guessExtension();
        // $filePath = public_path($filename);
        // //dd($filePath);
        // $fileData = File::get($filePath);

        // Storage::disk("google")->put($filename, $fileData);
        $archivo->store('', 'google');
        //$request->file('archivo')->store('', 'google');
        return 'File was saved to Google Drive';

        /******* */
        /*dd($name);
        Test::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
