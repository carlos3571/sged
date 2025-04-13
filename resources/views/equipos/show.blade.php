@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Equipo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del equipo:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="deporte" class="form-label">Deporte:</label>
            <input type="text" name="deporte" class="form-control" value="{{ old('deporte') }}" required>
        </div>

        <div class="mb-3">
            <label for="entrenador" class="form-label">Entrenador:</label>
            <input type="text" name="entrenador" class="form-control" value="{{ old('entrenador') }}" required>
        </div>

        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
