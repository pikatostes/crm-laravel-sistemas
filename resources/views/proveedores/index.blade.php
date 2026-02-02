@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Proveedores</h1>
@stop

@section('content')
<a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">
    Nuevo Proveedor
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Empresa</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proveedores as $proveedor)
        <tr>
            <td>{{ $proveedor->nombre }}</td>
            <td>{{ $proveedor->empresa }}</td>
            <td>{{ $proveedor->telefono }}</td>
            <td>
                <a href="{{ route('proveedores.edit',$proveedor) }}" class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('proveedores.destroy',$proveedor) }}"
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
