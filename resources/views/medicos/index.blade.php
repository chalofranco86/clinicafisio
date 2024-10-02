@extends('adminlte::page')

@section('title', 'Lista de Médicos')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Médicos</h3>
            <a href="{{ route('medicos.create') }}" class="btn btn-success">NUEVO</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="medicos-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Especialidad</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicos as $medico)
                            <tr>
                                <td>{{ $medico->id }}</td>
                                <td>{{ $medico->nombre }}</td>
                                <td>{{ $medico->apellido }}</td>
                                <td>{{ $medico->especialidad }}</td>
                                <td>{{ $medico->telefono }}</td>
                                <td>{{ $medico->email }}</td>
                                <td>
                                    <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-info">Editar</a>
                                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display:inline;">
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
            $('#medicos-table').DataTable({
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
        });
    </script>
@endsection
