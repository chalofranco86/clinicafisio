@extends('adminlte::page')

@section('title', 'Listado de Antecedentes')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de Antecedentes</h3>
            <div class="card-tools">
                <a href="{{ route('antecedentes.create') }}" class="btn btn-success">Crear Nuevo Antecedente</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Motivo Consulta</th>
                        <th>Tratamientos Previos</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($antecedentes as $antecedente)
                        <tr>
                            <td>{{ $antecedente->id }}</td>
                            <td>{{ $antecedente->paciente->nombre }}</td>
                            <td>{{ $antecedente->motivo_consulta }}</td>
                            <td>{{ $antecedente->tratamientos_previos }}</td>
                            <td>{{ $antecedente->observaciones_antecedentes }}</td>
                            <td>
                                <a href="{{ route('antecedentes.show', $antecedente->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('antecedentes.edit', $antecedente->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('antecedentes.destroy', $antecedente->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
