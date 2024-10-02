@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Crear Entrevista</h1>

    <form action="{{ route('entrevistapeds.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="paciente_id">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="">Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                @endforeach
            </select>
            @error('paciente_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="motivo_consulta">Motivo de Consulta</label>
            <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control" value="{{ old('motivo_consulta') }}" required>
            @error('motivo_consulta')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="aparicion">Aparición</label>
            <input type="text" name="aparicion" id="aparicion" class="form-control" value="{{ old('aparicion') }}" required>
            @error('aparicion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
