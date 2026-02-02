@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Empleados</h1>
@stop

@section('content')
<a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">
    Nuevo Empleado
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Email</th>
            <th>Salario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->puesto }}</td>
            <td>{{ $empleado->email }}</td>
            <td>{{ $empleado->salario }} €</td>
            <td>
                <a href="{{ route('empleados.edit',$empleado) }}" class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('empleados.destroy',$empleado) }}"
                      method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
