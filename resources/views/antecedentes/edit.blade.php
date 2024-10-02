@extends('adminlte::page')

@section('title', 'Editar Antecedente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Antecedente</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('antecedentes.update', $antecedente->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="paciente_id">Paciente:</label>
                    <select name="paciente_id" id="paciente_id" class="form-control">
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}" {{ $paciente->id == $antecedente->paciente_id ? 'selected' : '' }}>
                                {{ $paciente->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="motivo_consulta">Motivo de Consulta:</label>
                    <textarea name="motivo_consulta" id="motivo_consulta" class="form-control">{{ $antecedente->motivo_consulta }}</textarea>
                </div>

                <div class="form-group">
                    <label for="tratamientos_previos">Tratamientos Previos:</label>
                    <textarea name="tratamientos_previos" id="tratamientos_previos" class="form-control">{{ $antecedente->tratamientos_previos }}</textarea>
                </div>

                <div class="form-group">
                    <label for="observaciones_antecedentes">Observaciones:</label>
                    <textarea name="observaciones_antecedentes" id="observaciones_antecedentes" class="form-control">{{ $antecedente->observaciones_antecedentes }}</textarea>
                </div>

                <!-- Añadir otros campos según sea necesario -->

                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
