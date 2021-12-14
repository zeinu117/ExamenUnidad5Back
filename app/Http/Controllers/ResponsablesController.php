<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Responsables;
use Illuminate\Http\Request;

class ResponsablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $responsables = Responsables::orderBy('id','asc')->paginate(10);
        return view('responsables.index' , compact('responsables'));
    }
    public function agregar(){
        $areas = Areas::orderBy('id','asc')->paginate(10);
        return view ('responsables.create',compact('areas'));
    }
    public function add(Request $request){
        $responsables = new Responsables();

        $responsables->nombre = $request->nombre;
        $responsables->direccion = $request->direccion;
        $responsables->telefono = $request->telefono;
        $responsables->apellidos = $request->apellido;
        $responsables->areasId = $request->areasId;
        $responsables->save();
        return redirect()->route('responsables');
    }
    public function destroy(Responsables $responsables) {
        $responsables->delete();
        return redirect()->route('responsables')->with('eliminar','ok');
    }
    public function edit(Responsables $responsables){
        $areas = Areas::orderBy('id','asc')->paginate(10);
        return view('responsables.edit', compact('responsables','areas'));
    }
    public function update(Request $request, Responsables $responsables){
        $responsables->nombre = $request->nombre;
        $responsables->Apellidos = $request->apellido;
        $responsables->direccion = $request->direccion;
        $responsables->telefono = $request->telefono;
        $responsables->areasId = $request->areasId;

        $responsables->save();
        return redirect()->route('responsables');
    }
}
