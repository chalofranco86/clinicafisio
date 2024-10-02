@extends('adminlte::page')

@section('title', 'Ver Historial Clínico')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalle del Historial Clínico</h3>
        </div>
        <div class="card-body">
            <p><strong>Paciente:</strong> {{ $historial->paciente->nombre }}</p>
            <p><strong>Médico:</strong> {{ $historial->medico->nombre }}</p>
            <p><strong>Fecha:</strong> {{ $historial->created_at->format('d-m-Y') }}</p>
            <p><strong>Descripción:</strong> {{ $historial->diagnostico }}</p>
            <a href="{{ route('historial_clinico.edit', $historial->id) }}" class="btn btn-info">Editar</a>
            <form action="{{ route('historial_clinico.destroy', $historial->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
@endsection
