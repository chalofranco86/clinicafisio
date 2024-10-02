@extends('adminlte::page')

@section('title', 'Actualizar Paciente')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Actualizar Paciente</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pacientetipos_id">Tipo Paciente:</label>
                    <select name="pacientetipos_id" id="pacientetipos_id" class="form-control select2">
                        @foreach($pacientetipos as $tipo)
                            <option value="{{ $tipo->id }}" {{ $paciente->pacientetipos_id == $tipo->id ? 'selected' : '' }}>
                                {{ $tipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $paciente->nombre }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="escolaridad">Escolaridad:</label>
                    <input type="text" name="escolaridad" id="escolaridad" class="form-control" value="{{ $paciente->escolaridad }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ $paciente->fecha_nacimiento }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $paciente->telefono }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" class="form-control" value="{{ $paciente->domicilio }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="entidad">Entidad:</label>
                    <input type="text" name="entidad" id="entidad" class="form-control" value="{{ $paciente->entidad }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="ocupacion">Ocupación:</label>
                    <input type="text" name="ocupacion" id="ocupacion" class="form-control" value="{{ $paciente->ocupacion }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="edad">Edad:</label>
                    <input type="text" name="edad" id="edad" class="form-control" value="{{ $paciente->edad }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="lugar_nacimiento">Lugar de nacimiento:</label>
                    <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" class="form-control" value="{{ $paciente->lugar_nacimiento }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="estado_civil">Estado civil:</label>
                    <input type="text" name="estado_civil" id="estado_civil" class="form-control" value="{{ $paciente->estado_civil }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="genero">Género:</label>
                    <select name="genero" id="genero" class="form-control" required>
                        <option value="M" {{ $paciente->genero == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ $paciente->genero == 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4" id="embarazoField" style="display: {{ $paciente->genero == 'F' ? 'block' : 'none' }};">
                    <label>¿Está embarazada?</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="embarazo" value="Sí" {{ $paciente->embarazo == 'Sí' ? 'checked' : '' }}> 
                        <label class="form-check-label">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="embarazo" value="No" {{ $paciente->embarazo == 'No' ? 'checked' : '' }}> 
                        <label class="form-check-label">No</label>
                    </div>
                </div>

                <div class="form-group col-md-4" id="hijosField" style="display: {{ $paciente->embarazo == 'Sí' ? 'block' : 'none' }};">
                    <label for="hijos">Número de hijos:</label>
                    <input type="text" name="hijos" id="hijos" class="form-control" value="{{ $paciente->hijos }}">
                </div>

                <div class="form-group col-md-4" id="mesesEmbarazoField" style="display: {{ $paciente->embarazo == 'Sí' ? 'block' : 'none' }};">
                    <label for="meses_embarazo">Meses de embarazo:</label>
                    <input type="text" name="meses_embarazo" id="meses_embarazo" class="form-control" value="{{ $paciente->meses_embarazo }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="peso">Peso:</label>
                    <input type="text" name="peso" id="peso" class="form-control" value="{{ $paciente->peso }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="talla">Talla:</label>
                    <input type="text" name="talla" id="talla" class="form-control" value="{{ $paciente->talla }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="estatura">Estatura:</label>
                    <input type="text" name="estatura" id="estatura" class="form-control" value="{{ $paciente->estatura }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="imc">IMC:</label>
                    <input type="text" name="imc" id="imc" class="form-control" value="{{ $paciente->imc }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="etnia">Etnia:</label>
                    <input type="text" name="etnia" id="etnia" class="form-control" value="{{ $paciente->etnia }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
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

        // Mostrar/ocultar campos de embarazo según el género
        generoSelect.addEventListener('change', function () {
            if (generoSelect.value === 'F') {
                embarazoField.style.display = 'block';
            } else {
                embarazoField.style.display = 'none';
                hijosField.style.display = 'none';
                mesesEmbarazoField.style.display = 'none';
            }
        });

        // Mostrar/ocultar campos adicionales según si está embarazada
        embarazoRadios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (this.value === 'Sí') {
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
