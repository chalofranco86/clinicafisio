@extends('adminlte::page')

@section('title', 'Lista de Pacientes')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Pacientes</h3>
            <a href="{{ route('pacientes.create') }}" class="btn btn-success">NUEVO</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pacientes-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Domicilio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes as $paciente)
                            <tr>
                                <td>{{ $paciente->id }}</td>
                                <td>{{ $paciente->nombre }}</td>
                                <td>{{ $paciente->domicilio }}</td>

                                <td>
                                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-warning">Ver</a>
                                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
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
    </div>

    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Incluir DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Script para activar DataTables -->
    <script>
        $(document).ready(function() {
            // Verificación para asegurarse de que DataTables se ha cargado
            if ($.fn.DataTable) {
                $('#pacientes-table').DataTable({
                    "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros en total)",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            } else {
                console.error("DataTables no se ha cargado correctamente.");
            }
        });
    </script>
@endsection
