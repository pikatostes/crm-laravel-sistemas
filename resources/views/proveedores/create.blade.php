@extends('adminlte::page')

@section('title', 'Nuevo Proveedor')

@section('content_header')
    <h1>Nuevo Proveedor</h1>
@stop

@section('content')
<form action="{{ route('proveedores.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>

    <div class="form-group">
        <label>Empresa</label>
        <input type="text" name="empresa" class="form-control">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control">
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" class="form-control">
    </div>

    <button class="btn btn-success mt-2">Guardar</button>
</form>
@stop
