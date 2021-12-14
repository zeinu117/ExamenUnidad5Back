<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Responsables;
use App\Models\Salidas;
use Illuminate\Http\Request;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = Salidas::orderBy('id','asc')->paginate(10);
        return view('salidas.index', compact('salidas'));
    }
    public function agregar(){
        $responsables = Responsables::orderBy('id','asc')->paginate(10);
        $inventarios = Inventario::orderBy('id','asc')->paginate(10);
        return view ('salidas.create',compact('inventarios','responsables'));
    }
    public function add(Request $request){
        $salida = new Salidas();

        $salida->responsable_id = $request->responsable;
        $salida->articulo_id = $request->articulo_id;
        $salida->cantidad_salida = $request->cantidad;
        $salida->direccion_salida = $request->direccion;
        $salida->save();
        return redirect()->route('salidas');
    }
    public function destroy(Salidas $id) {
        $id->delete();
        return redirect()->route('salidas')->with('eliminar','ok');
    }
    public function edit(Salidas $salidas){
        $responsables = Responsables::orderBy('id','asc')->paginate(10);
        $inventario = Inventario::orderBy('id','asc')->paginate(10);
        return view('salidas.edit', compact('salidas','responsables','inventario'));
    }
    public function update(Request $request, Salidas $salidas){
        $salidas->responsable_id = $request->responsable;
        $salidas->cantidad_salida = $request->cantidad;
        $salidas->direccion_salida = $request->direccion;
        $salidas->created_at = $request->fecha;
        $salidas->articulo_id = $request->articulo_id;

        $salidas->save();
        return redirect()->route('salidas');
    }
}
