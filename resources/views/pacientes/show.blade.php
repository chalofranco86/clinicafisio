@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles del Paciente</h1>

    <!-- Mostrar los detalles del paciente -->
    <div class="card">
        <div class="card-header">
            <h3>{{ $paciente->nombre }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Tipo de Paciente:</strong> {{ $paciente->pacientetipo->nombre ?? 'No especificado' }}</p>
            <p><strong>Escolaridad:</strong> {{ $paciente->escolaridad }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $paciente->fecha_nacimiento }}</p>
            <p><strong>Género:</strong> {{ $paciente->genero }}</p>
            <p><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>
            <p><strong>Domicilio:</strong> {{ $paciente->domicilio }}</p>
            <p><strong>Entidad:</strong> {{ $paciente->entidad }}</p>
            <p><strong>Ocupación:</strong> {{ $paciente->ocupacion }}</p>
            <p><strong>Edad:</strong> {{ $paciente->edad }}</p>
            <p><strong>Lugar de Nacimiento:</strong> {{ $paciente->lugar_nacimiento }}</p>
            <p><strong>Estado Civil:</strong> {{ $paciente->estado_civil }}</p>
            <p><strong>Peso:</strong> {{ $paciente->peso }}</p>
            <p><strong>Talla:</strong> {{ $paciente->talla }}</p>
            <p><strong>Estatura:</strong> {{ $paciente->estatura }}</p>
            <p><strong>IMC:</strong> {{ $paciente->imc ?? 'No calculado' }}</p>
            <p><strong>Etnia:</strong> {{ $paciente->etnia ?? 'No especificado' }}</p>

            <!-- Campos de embarazo solo si son aplicables -->
            @if($paciente->genero === 'F')
                <p><strong>¿Está Embarazada?:</strong> {{ $paciente->embarazo }}</p>
                <p><strong>Hijos:</strong> {{ $paciente->hijos }}</p>
                <p><strong>Meses de Embarazo:</strong> {{ $paciente->meses_embarazo }}</p>
            @endif
        </div>

        <div class="card-footer">
            <!-- Botón para editar el paciente -->
            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>

            <!-- Botón para eliminar el paciente -->
            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este paciente?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection