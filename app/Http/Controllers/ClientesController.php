<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Clientes::create($request->all());
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado correctamente');
    }

    public function edit(Clientes $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Clientes $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy(Clientes $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente');
    }
}
