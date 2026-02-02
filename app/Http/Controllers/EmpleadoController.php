<?php

namespace App\Http\Controllers;
use App\Models\Empleado;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        Empleado::create($request->all());
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado correctamente');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->all());
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente');
    }
}
