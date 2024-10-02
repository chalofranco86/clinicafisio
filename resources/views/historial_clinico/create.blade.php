@extends('adminlte::page')

@section('title', 'Crear Historial Clínico')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nuevo Historial Clínico</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('historial_clinico.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="paciente_id">Paciente:</label>
                    <select name="paciente_id" id="paciente_id" class="form-control" required>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="medico_id">Médico:</label>
                    <select name="medico_id" id="medico_id" class="form-control" required>
                        @foreach($medicos as $medico)
                            <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="diagnostico">Diagnóstico:</label>
                    <textarea name="diagnostico" id="diagnostico" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tratamiento">Tratamiento:</label>
                    <textarea name="tratamiento" id="tratamiento" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
@endsection
