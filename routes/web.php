<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('clientes', ClientesController::class);
Route::resource('productos', ProductosController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('proveedores', ProveedorController::class)
     ->parameters(['proveedores' => 'proveedor']);
Route::resource('facturas', FacturaController::class);
