<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Areas::orderBy('id','asc')->paginate(10);
        return view('areas.index', compact('areas'));
    }

    public function destroy(Areas $id) {
        $id->delete();
        return redirect()->route('areas')->with('eliminar','ok');
    }
    public function edit(Areas $areas){
        return view('areas.edit', compact('areas'));

    }
    public function update(Request $request, Areas $areas){

        $areas->nombre = $request->nombre;
        $areas->save();
        return redirect()->route('areas');
    }
    public function agregar(){
        $areas = Areas::orderBy('id','asc');
        return view ('areas.create', compact('areas'));
    }
    public function add(Request $request){
        $areas = new Areas();

        $areas->nombre = $request->nombre;
        $areas->save();
        return redirect()->route('areas');
    }
}
