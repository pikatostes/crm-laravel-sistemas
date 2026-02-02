@extends('adminlte::page')

@section('title', 'Nueva Factura')

@section('content_header')
    <h1>Nueva Factura</h1>
@stop

@section('content')
<form action="{{ route('facturas.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Número de factura</label>
        <input type="text" name="numero_factura" class="form-control">
    </div>

    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha" class="form-control">
    </div>

    <div class="form-group">
        <label>Cliente</label>
        <input type="text" name="cliente" class="form-control">
    </div>

    <div class="form-group">
        <label>Total</label>
        <input type="number" step="0.01" name="total" class="form-control">
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select name="estado" class="form-control">
            <option value="Pendiente">Pendiente</option>
            <option value="Pagada">Pagada</option>
            <option value="Cancelada">Cancelada</option>
        </select>
    </div>

    <button class="btn btn-success mt-2">Guardar</button>
</form>
@stop
