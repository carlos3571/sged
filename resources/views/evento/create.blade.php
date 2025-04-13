@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Evento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay errores en el formulario.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eventos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Evento:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación:</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion') }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Evento:</label>
            <select name="tipo" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="torneo" {{ old('tipo') == 'torneo' ? 'selected' : '' }}>Torneo</option>
                <option value="partido amistoso" {{ old('tipo') == 'partido amistoso' ? 'selected' : '' }}>Partido Amistoso</option>
                <option value="maratón" {{ old('tipo') == 'maratón' ? 'selected' : '' }}>Maratón</option>
                <option value="otro" {{ old('tipo') == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar Evento</button>
    </form>
</div>
@endsection
