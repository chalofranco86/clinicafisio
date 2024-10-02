@extends('adminlte::page')

@section('title', 'Editar Entrevista Pediátrica')

@section('content_header')
    <h1>Editar Entrevista Pediátrica</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Edición</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('entrevistapeds.update', $entrevista->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="paciente_id">Nombre del Paciente:</label>
                            <select name="paciente_id" class="form-control" required>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}" {{ $paciente->id == $entrevista->paciente_id ? 'selected' : '' }}>
                                        {{ $paciente->nombre }} <!-- Cambia 'nombre' al campo real que tengas en tu tabla 'pacientes' -->
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fecha_entrevista">Fecha de la Entrevista:</label>
                            <input type="date" name="fecha_entrevista" class="form-control" value="{{ $entrevista->created_at->format('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="motivo_consulta">Motivo Consulta:</label>
                            <textarea name="motivo_consulta" class="form-control" rows="3" required>{{ $entrevista->motivo_consulta }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="aparicion">Aparicion:</label>
                            <textarea name="aparicion" class="form-control" rows="3" required>{{ $entrevista->aparicion }}</textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="{{ route('entrevistapeds.index') }}" class="btn btn-default">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
