@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Escalas de Desarrollo</h1>

    <!-- Mensajes de éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('escala_desarrollo.create') }}" class="btn btn-primary mb-3">Crear Nueva Escala</a>

    <!-- Tabla de escalas de desarrollo -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Motora Gruesa (1-15 meses)</th>
                <th>Motora Fina (1-15 meses)</th>
                <th>Cognoscitiva (1-15 meses)</th>
                <th>Lenguaje (1-15 meses)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($escalas as $escala)
                <tr>
                    <td>{{ $escala->id }}</td>
                    <td>{{ $escala->paciente->nombre }} {{ $escala->paciente->apellido }}</td>
                    <td>{{ $escala->motora_gruesa_1_15 ? 'Sí' : 'No' }}</td>
                    <td>{{ $escala->motora_fina_1_15 ? 'Sí' : 'No' }}</td>
                    <td>{{ $escala->cognoscitiva_1_15 ? 'Sí' : 'No' }}</td>
                    <td>{{ $escala->lenguaje_1_15 ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('escala_desarrollo.show', $escala->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('escala_desarrollo.edit', $escala->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('escala_desarrollo.destroy', $escala->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta escala?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
