@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Lista de Evaluaciones</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>MSD Lanza</th>
                <th>MSI Lanza</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluaciones as $evaluacion)
                <tr>
                    <td>{{ $evaluacion->id }}</td>
                    <td>{{ $evaluacion->paciente->nombre }} {{ $evaluacion->paciente->apellido }}</td>
                    <td>{{ $evaluacion->msd_lanza }}</td>
                    <td>{{ $evaluacion->msi_lanza }}</td>
                    <td>
                        <a href="{{ route('evaluaciones.edit', $evaluacion) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('evaluaciones.show', $evaluacion->id) }}" class="btn btn-info">Ver Detalles</a>
                        <!-- Formulario para eliminar -->
                        <form action="{{ route('evaluaciones.destroy', $evaluacion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta evaluación?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('evaluaciones.create') }}" class="btn btn-success">Nueva Evaluación</a>
</div>
@endsection