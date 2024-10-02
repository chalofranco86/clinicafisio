@extends('adminlte::page')

@section('title', 'Ver Antecedente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalle del Antecedente</h3>
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Paciente:</strong> {{ $antecedente->paciente->nombre }}</li>
                <li><strong>Motivo de Consulta:</strong> {{ $antecedente->motivo_consulta }}</li>
                <li><strong>Tratamientos Previos:</strong> {{ $antecedente->tratamientos_previos }}</li>
                <li><strong>Observaciones:</strong> {{ $antecedente->observaciones_antecedentes }}</li>
                <!-- Añadir más campos si es necesario -->
            </ul>
            <a href="{{ route('antecedentes.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection
