@extends('adminlte::page')

@section('title', 'Editar Empleado')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')
<form action="{{ route('empleados.update',$empleado) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ $empleado->email }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ $empleado->telefono }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Puesto</label>
        <input type="text" name="puesto" value="{{ $empleado->puesto }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Salario</label>
        <input type="number" step="0.01" name="salario" value="{{ $empleado->salario }}" class="form-control">
    </div>

    <button class="btn btn-primary mt-2">Actualizar</button>
</form>
@stop
