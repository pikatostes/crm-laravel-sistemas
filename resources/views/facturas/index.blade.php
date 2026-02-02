@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <h1>Facturas</h1>
@stop

@section('content')
<a href="{{ route('facturas.create') }}" class="btn btn-primary mb-3">
    Nueva Factura
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nº Factura</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($facturas as $factura)
        <tr>
            <td>{{ $factura->numero_factura }}</td>
            <td>{{ $factura->fecha }}</td>
            <td>{{ $factura->cliente }}</td>
            <td>{{ $factura->total }} €</td>
            <td>{{ $factura->estado }}</td>
            <td>
                <a href="{{ route('facturas.edit',$factura) }}" class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('facturas.destroy',$factura) }}"
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
