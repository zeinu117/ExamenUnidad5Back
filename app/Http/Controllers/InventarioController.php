<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Inventario;
use App\Models\Responsables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::orderBy('id','asc')->paginate(10);
        $responsables = Responsables::orderBy('id','asc')->paginate(10);
        return view('inventario.index', compact('inventarios','responsables'));
    }
    public function agregar(){
        $responsables = Responsables::orderBy('id','asc')->paginate(10);
        $areas = Areas::orderBy('id','asc')->paginate(10);
        return view ('inventario.create', compact('areas','responsables'));
    }
    public function add(Request $request){
        $inventario = new Inventario();
        $inventario->nombre = $request->nombre_articulo;
        $inventario->responsables_id = $request->responsable;
        $inventario->area_id = $request->areasId;
        $inventario->fecha_adquisicion = $request->fechaAdquisicion;
        $inventario->codigo = $request->codigo;
        $inventario->numero_folio_comprobante = $request->folio;
        $inventario->descripcion = $request->descripcion;
        $inventario->marca = $request->marca;
        $inventario->modelo = $request->modelo;
        $inventario->serie = $request->serie;
        $inventario->cantidad = $request->cantidad;
        if($request->hasFile("img")){
        $imagen = $request->file('img');
        $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
        $ruta = public_path("img/fotos/");
        $imagen->move($ruta,$nombreimagen);
        $inventario->img = $nombreimagen;
        }
        $inventario->save();
        return redirect()->route('inventario');
    }
    public function show($id){
        $inventarios = Inventario::find($id);
        return view('inventario.show',compact('inventarios'));
    }
    public function destroy(Inventario $id) {
        $id->delete();
        return redirect()->route('inventario')->with('eliminar','ok');
    }
    public function edit(Inventario $inventarios){
        $responsables = Responsables::orderBy('id','asc')->paginate(10);
        $areas = Areas::orderBy('id','asc')->paginate(10);
        return view('inventario.edit', compact('inventarios','areas','responsables'));
    }
    public function update(Request $request, Inventario $inventarios){
        $inventarios->nombre = $request->nombre_articulo;
        $inventarios->responsables_id = $request->responsable;
        $inventarios->area_id = $request->areasId;
        $inventarios->fecha_adquisicion = $request->fechaAdquisicion;
        $inventarios->codigo = $request->codigo;
        $inventarios->numero_folio_comprobante = $request->folio;
        $inventarios->descripcion = $request->descripcion;
        $inventarios->marca = $request->marca;
        $inventarios->modelo = $request->modelo;
        $inventarios->serie = $request->serie;
        $inventarios->cantidad = $request->cantidad;
        if($request->hasFile("img")){
        $imagen = $request->file('img');
        $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
        $ruta = public_path("img/fotos/");
        $imagen->move($ruta,$nombreimagen);
        $inventarios->img = $nombreimagen;
        }
        $inventarios->save();
        return redirect()->route('inventario');
    }
}
