@extends('adminlte::page')

@section('title', 'Editar Proveedor')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
<form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $proveedor->nombre }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Empresa</label>
        <input type="text" name="empresa" value="{{ $proveedor->empresa }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ $proveedor->email }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ $proveedor->telefono }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" value="{{ $proveedor->direccion }}" class="form-control">
    </div>

    <button class="btn btn-primary mt-2">Actualizar</button>
</form>
@stop
