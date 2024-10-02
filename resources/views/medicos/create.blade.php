@extends('adminlte::page')

@section('title', 'Agregar Médico')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Agregar Médico</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('medicos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="especialidad">Especialidad:</label>
                    <input type="text" name="especialidad" id="especialidad" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numero_licencia">Número de Licencia:</label>
                    <input type="text" name="numero_licencia" id="numero_licencia" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
@endsection
