@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')
<form action="{{ route('productos.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>

    <div class="form-group">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control">
    </div>

    <div class="form-group">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control">
    </div>

    <button class="btn btn-success mt-2">Guardar</button>
</form>
@stop
