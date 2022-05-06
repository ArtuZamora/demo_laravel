<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editorial;

class EditorialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editoriales = Editorial::all();
        return view('editoriales.index', ["editoriales" => $editoriales]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editoriales.create');
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
            'codigo_editorial' => ['required', 'regex:/^EDI[0-9]{3}$/'],
            'nombre_editorial' => 'required',
            'contacto' => 'required',
            'telefono' => ['required', 'regex:/^[267][0-9]{3}-?[0-9]{4}$/']
        ]);

        $editorial = new Editorial();
        $editorial->codigo_editorial = $request->codigo_editorial;
        $editorial->nombre_editorial = $request->nombre_editorial;
        $editorial->contacto = $request->contacto;
        $editorial->telefono = $request->telefono;
        $editorial->save();
        return redirect()->route('editoriales.index')->with('status', 'Editorial registrada con éxito');
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
        $editorial=Editorial::find($id);
        return view('editoriales.edit', compact('editorial'));
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
        $request->validate([
            'codigo_editorial' => ['required', 'regex:/^EDI[0-9]{3}$/'],
            'nombre_editorial' => 'required',
            'contacto' => 'required',
            'telefono' => ['required', 'regex:/^[267][0-9]{3}-?[0-9]{4}$/']
        ]);

        $editorial=Editorial::find($id);
        $editorial->codigo_editorial=$request->codigo_editorial;
        $editorial->nombre_editorial=$request->nombre_editorial;
        $editorial->contacto=$request->contacto;
        $editorial->telefono=$request->telefono;
        $editorial->save();
        return redirect()->route('editoriales.index')->with('status', 'Editorial editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Editorial::destroy($id);
        return redirect()->route('editoriales.index')->with('status', 'Editorial eliminada con éxito');
    }
}
