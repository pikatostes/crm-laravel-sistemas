@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
<a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">
    Nuevo Cliente
</a>

<div class="card">
    <div class="card-body">
        <table id="clientes-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Archivo (PDF)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td class="text-center">
                        @if($cliente->foto)
                            <img src="{{ asset('storage/'.$cliente->foto) }}"
                                 width="50"
                                 height="50"
                                 class="rounded shadow-sm"
                                 style="object-fit:cover">
                        @else
                            <span class="text-muted">Sin foto</span>
                        @endif
                    </td>

                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>

                    <td class="text-center">
                        @if($cliente->archivo)
                            <a href="{{ asset('storage/'.$cliente->archivo) }}"
                               target="_blank"
                               class="btn btn-sm btn-info">
                                Ver PDF
                            </a>
                        @else
                            <span class="text-muted">Sin archivo</span>
                        @endif
                    </td>

                    <td class="text-nowrap">
                        <a href="{{ route('clientes.edit', $cliente) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('clientes.destroy', $cliente) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este cliente?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('js')
<script>
    $(function () {
        $('#clientes-table').DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 10,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>
@stop