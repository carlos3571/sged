@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Participación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay errores en el formulario:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('participaciones.update', $participacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="evento_id" class="form-label">Evento:</label>
            <select name="evento_id" class="form-select" required>
                <option value="">Seleccione un evento</option>
                @foreach ($eventos as $evento)
                    <option value="{{ $evento->id }}" {{ old('evento_id', $participacion->evento_id) == $evento->id ? 'selected' : '' }}>
                        {{ $evento->nombre }} ({{ $evento->fecha }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo:</label>
            <select name="equipo_id" class="form-select" required>
                <option value="">Seleccione un equipo</option>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ old('equipo_id', $participacion->equipo_id) == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }} - {{ $equipo->deporte }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="resultado" class="form-label">Resultado:</label>
            <input type="text" name="resultado" class="form-control" value="{{ old('resultado', $participacion->resultado) }}">
        </div>

        <div class="mb-3">
            <label for="premios" class="form-label">Premios:</label>
            <input type="text" name="premios" class="form-control" value="{{ old('premios', $participacion->premios) }}">
        </div>

        <a href="{{ route('participaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar Participación</button>
    </form>
</div>
@endsection
