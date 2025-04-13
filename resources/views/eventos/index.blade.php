@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
<div class="container">
    <h1>Lista de Eventos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('eventos.create') }}" class="btn btn-success mb-3">Crear Nuevo Evento</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Ubicación</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->fecha }}</td>
                    <td>{{ $evento->ubicacion }}</td>
                    <td>{{ $evento->tipo }}</td>
                    <td>
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Deseas eliminar este evento?')" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay eventos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
