@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Participaciones</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('participaciones.create') }}" class="btn btn-success mb-3">Registrar Nueva Participación</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Evento</th>
                <th>Equipo</th>
                <th>Resultado</th>
                <th>Premios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($participaciones as $participacion)
                <tr>
                    <td>{{ $participacion->id }}</td>
                    <td>{{ $participacion->evento->nombre ?? 'Sin evento' }}</td>
                    <td>{{ $participacion->equipo->nombre ?? 'Sin equipo' }}</td>
                    <td>{{ $participacion->resultado ?? '-' }}</td>
                    <td>{{ $participacion->premios ?? '-' }}</td>
                    <td>
                        <a href="{{ route('participaciones.edit', $participacion->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('participaciones.destroy', $participacion->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Deseas eliminar esta participación?')" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay participaciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection