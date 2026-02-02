@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
<form action="{{ route('productos.update',$producto) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Stock</label>
        <input type="number" name="stock" value="{{ $producto->stock }}" class="form-control">
    </div>

    <button class="btn btn-primary mt-2">Actualizar</button>
</form>
@stop
