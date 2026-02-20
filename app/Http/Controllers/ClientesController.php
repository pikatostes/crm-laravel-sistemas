<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = auth()->user(); // <-- capturarlo aquí fuera

            $clientes = Clientes::select(['id', 'nombre', 'email', 'foto', 'created_at']);
            return DataTables::of($clientes)
                ->addColumn('acciones', function ($cliente) use ($user) { // <-- pasarlo con use
                    $btn = '<a href="' . route('clientes.edit', $cliente->id) . '" class="btn btn-sm btn-warning">Editar</a> ';
                    if ($user && $user->isAdmin()) { // <-- usarlo directamente
                        $btn .= '<form action="' . route('clientes.destroy', $cliente->id) . '" method="POST" style="display:inline">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button class="btn btn-sm btn-danger" onclick="return confirm(\'¿Eliminar?\')">Borrar</button>
                    </form>';
                    }
                    return $btn;
                })
                ->addColumn('foto_preview', function ($cliente) {
                    if ($cliente->foto) {
                        return '<img src="' . asset('storage/' . $cliente->foto) . '" width="50" class="rounded">';
                    }
                    return 'Sin foto';
                })
                ->rawColumns(['acciones', 'foto_preview'])
                ->make(true);
        }

        return view('clientes.index');
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
