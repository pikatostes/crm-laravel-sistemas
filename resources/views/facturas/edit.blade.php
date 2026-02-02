@extends('adminlte::page')

@section('title', 'Editar Factura')

@section('content_header')
    <h1>Editar Factura</h1>
@stop

@section('content')
<form action="{{ route('facturas.update',$factura) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Número de factura</label>
        <input type="text" name="numero_factura"
               value="{{ $factura->numero_factura }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha"
               value="{{ $factura->fecha }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Cliente</label>
        <input type="text" name="cliente"
               value="{{ $factura->cliente }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Total</label>
        <input type="number" step="0.01" name="total"
               value="{{ $factura->total }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select name="estado" class="form-control">
            <option {{ $factura->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option {{ $factura->estado == 'Pagada' ? 'selected' : '' }}>Pagada</option>
            <option {{ $factura->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
        </select>
    </div>

    <button class="btn btn-primary mt-2">Actualizar</button>
</form>
@stop
