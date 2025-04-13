@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Equipos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('equipos.create') }}" class="btn btn-success mb-3">Crear Nuevo Equipo</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Deporte</th>
                <th>Entrenador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->deporte }}</td>
                    <td>{{ $equipo->entrenador }}</td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este equipo?')" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay equipos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection