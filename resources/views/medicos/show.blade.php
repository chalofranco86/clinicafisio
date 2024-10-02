@extends('adminlte::page')

@section('title', 'Detalles del Médico')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Médico</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <p>{{ $medico->nombre }}</p>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <p>{{ $medico->apellido }}</p>
            </div>
            <div class="form-group">
                <label for="especialidad">Especialidad:</label>
                <p>{{ $medico->especialidad }}</p>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <p>{{ $medico->telefono }}</p>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <p>{{ $medico->email }}</p>
            </div>
            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
