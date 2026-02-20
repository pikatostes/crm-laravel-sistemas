@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content_header')
<h1>Nuevo Cliente</h1>
@stop

@section('content')
<form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control">
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

    <div class="mb-3">
        <label class="form-label">Foto del cliente</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if(isset($cliente) && $cliente->foto)
        <img src="{{ asset('storage/'.$cliente->foto) }}" width="80" class="mt-2 rounded">
        @endif
        @error('foto') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    {{-- Archivo PDF --}}
    <div class="mb-3">
        <label class="form-label">Documento PDF</label>
        <input type="file" name="archivo" class="form-control" accept=".pdf">
        @if(isset($cliente) && $cliente->archivo)
        <a href="{{ asset('storage/'.$cliente->archivo) }}" target="_blank" class="d-block mt-1">Ver PDF actual</a>
        @endif
        @error('archivo') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button class="btn btn-success mt-2">Guardar</button>
</form>
@stop