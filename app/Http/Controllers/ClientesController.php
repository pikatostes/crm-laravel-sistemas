<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::paginate(10); // ← paginate en lugar de all()
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:clientes,email',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'archivo'  => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $data = $request->except(['foto', 'archivo']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('clientes/fotos', 'public');
        }

        if ($request->hasFile('archivo')) {
            $data['archivo'] = $request->file('archivo')->store('clientes/archivos', 'public');
        }

        Clientes::create($data);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show(Clientes $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Clientes $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Clientes $cliente)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:clientes,email,' . $cliente->id,
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'archivo'  => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $data = $request->except(['foto', 'archivo']);

        if ($request->hasFile('foto')) {
            if ($cliente->foto) Storage::disk('public')->delete($cliente->foto);
            $data['foto'] = $request->file('foto')->store('clientes/fotos', 'public');
        }

        if ($request->hasFile('archivo')) {
            if ($cliente->archivo) Storage::disk('public')->delete($cliente->archivo);
            $data['archivo'] = $request->file('archivo')->store('clientes/archivos', 'public');
        }

        $cliente->update($data);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado.');
    }

    public function destroy(Clientes $cliente)
    {
        if ($cliente->foto)        Storage::disk('public')->delete($cliente->foto);
        if ($cliente->archivo_pdf) Storage::disk('public')->delete($cliente->archivo_pdf);

        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente');
    }
}
