<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\Codea;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ResponsablesController;
use App\Http\Controllers\SalidasController;
use App\Models\Responsables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to("/login");
});

Auth::routes();



Route::middleware('valido')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/areas', [App\Http\Controllers\AreasController::class, 'index'])->name('areas');
    Route::get('/responsables', [App\Http\Controllers\ResponsablesController::class, 'index'])->name('responsables');
    Route::get('/inventario', [App\Http\Controllers\InventarioController::class, 'index'])->name('inventario');
    Route::get('/salidas', [App\Http\Controllers\SalidasController::class, 'index'])->name('salidas');
    Route::delete('areas/{id}', [App\Http\Controllers\AreasController::class,'destroy'])->name('areas.destroy');
    Route::get('areas/{areas}/edit', [AreasController::class, 'edit'])->name('areas.edit');
    Route::put('areas/{areas}', [AreasController::class, 'update'])->name('areas.update');
    Route::get('areas/create', [AreasController::class, 'agregar'])->name('areas.create');
    Route::post('areas', [AreasController::class, 'add'])->name('areas.add');
    Route::get('responsables/create', [App\Http\Controllers\ResponsablesController::class, 'agregar'])->name('responsables.agregar');
    Route::post('responsables', [App\Http\Controllers\ResponsablesController::class, 'add'])->name('responsables.add');
    Route::delete('Responsables/{responsables}', [ResponsablesController::class,'destroy'])->name('responsables.destroy');
    Route::get('responsables/{responsables}/edit', [ResponsablesController::class, 'edit'])->name('responsables.edit');
    Route::put('responsables/{responsables}', [ResponsablesController::class, 'update'])->name('responsables.update');
    Route::get('salidas/create', [SalidasController::class, 'agregar'])->name('salidas.create');
    Route::post('salidas', [App\Http\Controllers\SalidasController::class, 'add'])->name('salidas.add');
    Route::delete('salidas/{id}', [App\Http\Controllers\SalidasController::class,'destroy'])->name('salidas.destroy');
    Route::get('salidas/{salidas}/edit', [SalidasController::class, 'edit'])->name('salidas.edit');
    Route::put('salidas/{salidas}', [SalidasController::class, 'update'])->name('salidas.update');
    Route::get('inventario/create', [InventarioController::class, 'agregar'])->name('inventario.create');
    Route::post('inventario', [App\Http\Controllers\InventarioController::class, 'add'])->name('inventario.add');
    Route::get('inventario/{id}',[InventarioController::class,'show'])->name('inventario.show');
    Route::delete('inventario/{id}', [InventarioController::class,'destroy'])->name('inventario.destroy');
    Route::get('inventario/{inventarios}/edit', [InventarioController::class, 'edit'])->name('inventario.edit');
    Route::put('inventario/{inventarios}', [InventarioController::class, 'update'])->name('inventario.update');

});
