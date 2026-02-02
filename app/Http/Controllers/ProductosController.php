<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        Productos::create($request->all());
        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    public function edit(Productos $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Productos $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Productos $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
