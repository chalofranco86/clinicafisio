@extends('adminlte::page')

@section('title', 'Detalles de la Entrevista Pediátrica')

@section('content_header')
    <h1>Detalles de la Entrevista Pediátrica</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información General</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre_paciente">Nombre del Paciente:</label>
                        <p>{{ $entrevista->paciente->nombre }}</p> <!-- Cambia 'nombre' al campo real que tengas en tu tabla 'pacientes' -->
                    </div>

                    <div class="form-group">
                        <label for="edad">Edad del Paciente:</label>
                        <p>{{ $entrevista->paciente->edad }}</p> 
                    </div>

                    <div class="form-group">
                        <label for="fecha_entrevista">Fecha de la Entrevista:</label>
                        <p>{{ $entrevista->created_at }}</p>
                    </div>

                    <div class="form-group">
                        <label for="diagnostico">Motivo Consulta:</label>
                        <p>{{ $entrevista->motivo_consulta }}</p>
                    </div>

                    <div class="form-group">
                        <label for="tratamiento">Aparicion:</label>
                        <p>{{ $entrevista->aparicion }}</p>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('entrevistapeds.edit', $entrevista->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('entrevistapeds.index') }}" class="btn btn-default">Regresar</a>
                    <a href="{{ route('entrevistapeds.pdf', $entrevista->id) }}" class="btn btn-secondary">Generar PDF</a>
                </div>
            </div>
        </div>
    </div>
@stop