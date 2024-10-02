@extends('adminlte::page')

@section('title', 'Crear Paciente')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Crear Paciente</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('pacientes.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pacientetipos_id">Tipo Paciente:</label>
                    <select name="pacientetipos_id" id="pacientetipos_id" class="form-control select2">
                        @foreach($pacientetipos as $pacientetipos)
                            <option value="{{ $pacientetipos->id }}">{{ $pacientetipos->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="escolaridad">Escolaridad:</label>
                    <input type="text" name="escolaridad" id="escolaridad" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="entidad">Entidad:</label>
                    <input type="text" name="entidad" id="entidad" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="ocupacion">Ocupación:</label>
                    <input type="text" name="ocupacion" id="ocupacion" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="edad">Edad:</label>
                    <input type="text" name="edad" id="edad" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="lugar_nacimiento">Lugar de nacimiento:</label>
                    <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="estado_civil">Estado civil:</label>
                    <input type="text" name="estado_civil" id="estado_civil" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="genero">Género:</label>
                    <select name="genero" id="genero" class="form-control" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4" id="embarazoField" style="display: none;">
                    <label>¿Está embarazada?</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="embarazo" value="Sí"> 
                        <label class="form-check-label">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="embarazo" value="No"> 
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="form-group col-md-4" id="hijosField" style="display: none;">
                    <label for="hijos">Número de hijos:</label>
                    <input type="text" name="hijos" id="hijos" class="form-control">
                </div>
                <div class="form-group col-md-4" id="mesesEmbarazoField" style="display: none;">
                    <label for="meses_embarazo">Meses de embarazo:</label>
                    <input type="text" name="meses_embarazo" id="meses_embarazo" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="peso">Peso:</label>
                    <input type="text" name="peso" id="peso" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="talla">Talla:</label>
                    <input type="text" name="talla" id="talla" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="estatura">Estatura:</label>
                    <input type="text" name="estatura" id="estatura" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="imc">IMC:</label>
                    <input type="text" name="imc" id="imc" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="etnia">Etnia:</label>
                    <input type="text" name="etnia" id="etnia" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const generoSelect = document.getElementById('genero');
        const embarazoField = document.getElementById('embarazoField');
        const hijosField = document.getElementById('hijosField');
        const mesesEmbarazoField = document.getElementById('mesesEmbarazoField');
        const embarazoRadios = document.getElementsByName('embarazo');

        // Función para mostrar/ocultar el campo de embarazo según el género
        generoSelect.addEventListener('change', function () {
            if (generoSelect.value === 'F') {
                embarazoField.style.display = 'block';
            } else {
                embarazoField.style.display = 'none';
                hijosField.style.display = 'none';  // Esconder hijos y meses_embarazo si el género es masculino
                mesesEmbarazoField.style.display = 'none';
            }
        });

        // Función para mostrar/ocultar los campos de hijos y meses de embarazo
        embarazoRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (radio.value === 'Sí') {
                    hijosField.style.display = 'block';
                    mesesEmbarazoField.style.display = 'block';
                } else {
                    hijosField.style.display = 'none';
                    mesesEmbarazoField.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection