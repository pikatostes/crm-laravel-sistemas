@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
<form action="{{ route('clientes.update', $cliente) }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       value="{{ old('nombre', $cliente->nombre) }}"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email', $cliente->email) }}"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text"
                       name="telefono"
                       value="{{ old('telefono', $cliente->telefono) }}"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Dirección</label>
                <input type="text"
                       name="direccion"
                       value="{{ old('direccion', $cliente->direccion) }}"
                       class="form-control">
            </div>
        </div>

        <div class="col-md-6">

            {{-- FOTO --}}
            <div class="form-group">
                <label>Foto actual</label><br>

                @if($cliente->foto)
                    <img src="{{ asset('storage/'.$cliente->foto) }}"
                         width="120"
                         class="rounded shadow mb-2">
                @else
                    <p class="text-muted">Sin foto</p>
                @endif

                <input type="file"
                       name="foto"
                       class="form-control mt-2"
                       accept="image/*">
                <small class="text-muted">
                    JPG, PNG, WEBP · Máx 2MB
                </small>
            </div>

            {{-- PDF --}}
            <div class="form-group mt-3">
                <label>Archivo PDF actual</label><br>

                @if($cliente->archivo)
                    <a href="{{ asset('storage/'.$cliente->archivo) }}"
                       target="_blank"
                       class="btn btn-info btn-sm mb-2">
                        Ver PDF actual
                    </a>
                @else
                    <p class="text-muted">Sin archivo</p>
                @endif

                <input type="file"
                       name="archivo"
                       class="form-control mt-2"
                       accept="application/pdf">
                <small class="text-muted">
                    Solo PDF · Máx 5MB
                </small>
            </div>

        </div>
    </div>

    <div class="mt-3">
        <button class="btn btn-primary">
            Actualizar
        </button>

        <a href="{{ route('clientes.index') }}" 
           class="btn btn-secondary">
            Cancelar
        </a>
    </div>
</form>
@stop