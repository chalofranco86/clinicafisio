@extends('adminlte::page')

@section('title', 'Editar Historial Clínico')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Historial Clínico</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('historial_clinico.update', $historial->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="paciente_id">Paciente:</label>
                    <select name="paciente_id" id="paciente_id" class="form-control" required>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}" {{ $historial->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="medico_id">Médico:</label>
                    <select name="medico_id" id="medico_id" class="form-control" required>
                        @foreach($medicos as $medico)
                            <option value="{{ $medico->id }}" {{ $historial->medico_id == $medico->id ? 'selected' : '' }}>{{ $medico->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $historial->descripcion }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
