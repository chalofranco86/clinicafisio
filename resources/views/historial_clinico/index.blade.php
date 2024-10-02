@extends('adminlte::page')

@section('title', 'Lista de Historiales Clínicos')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Historiales Clínicos</h3>
            <a href="{{ route('historial_clinico.create') }}" class="btn btn-success">NUEVO</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="historiales-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Paciente</th>
                            <th>Médico</th>
                            <th>Fecha</th>
                            <th>Diagnostico</th>
                            <th>Tratamiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historiales as $historial)
                            <tr>
                                <td>{{ $historial->id }}</td>
                                <td>{{ $historial->paciente->nombre }}</td>
                                <td>{{ $historial->medico->nombre }}</td>
                                <td>{{ $historial->fecha }}</td>
                                <td>{{ $historial->diagnostico }}</td>
                                <td>{{ $historial->tratamiento }}</td>
                                <td>
                                    <a href="{{ route('historial_clinico.show', $historial->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('historial_clinico.edit', $historial->id) }}" class="btn btn-info">Editar</a>
                                    <form action="{{ route('historial_clinico.destroy', $historial->id) }}" method="POST" style="display:inline;">
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
@endsection

<!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Incluir DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- Incluir DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Script para activar DataTables -->
<script>
    $(document).ready(function() {
        $('#historiales-table').DataTable({
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
