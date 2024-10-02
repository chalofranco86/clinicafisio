@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Entrevistas Pediátricas</h1>
    
    <!-- Enlace para crear una nueva entrevista -->
    <a href="{{ route('entrevistapeds.create') }}" class="btn btn-primary mb-3">Nueva Entrevista</a>

    <!-- Tabla para listar las entrevistas -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Motivo de la Consulta</th>
                <th>Aparición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entrevistapeds as $entrevistaped)
            <tr>
                <td>{{ $entrevistaped->id }}</td>
                <td>{{ $entrevistaped->paciente->nombre }} <!-- Asegúrate de tener la relación en el modelo --></td>
                <td>{{ $entrevistaped->motivo_consulta }}</td>
                <td>{{ $entrevistaped->aparicion }}</td>
                <td>
                    <!-- Botón para ver la entrevista -->
                    <a href="{{ route('entrevistapeds.show', $entrevistaped->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <!-- Botón para editar la entrevista -->
                    <a href="{{ route('entrevistapeds.edit', $entrevistaped->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <!-- Formulario para eliminar -->
                    <form action="{{ route('entrevistapeds.destroy', $entrevistaped->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta entrevista?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $entrevistapeds->links() }}
</div>
@endsection
