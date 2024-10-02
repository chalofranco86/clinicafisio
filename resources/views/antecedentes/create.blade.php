@extends('adminlte::page')

@section('title', 'Crear Antecedente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Nuevo Antecedente</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('antecedentes.store') }}" method="POST">
                @csrf

                <!-- Información del Paciente y Terapeuta -->
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="paciente_id">Paciente:</label>
                    <select name="paciente_id" id="paciente_id" class="form-control select2" onchange="if (this.value === 'nuevo') { window.location.href = '{{ route('pacientes.create') }}'; }">
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                        @endforeach
                        <option value="nuevo">NUEVO</option>
                    </select>
                </div>
                    <div class="form-group col-md-4">
                        <label for="medico_id">Terapeuta:</label>
                        <select name="medico_id" id="medico_id" class="form-control select2">
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fecha_antecedente">Fecha:</label>
                        <input type="date" name="fecha_antecedente" id="fecha_antecedente" class="form-control" required>
                    </div>
                </div>

                <!-- Motivo y Tratamientos Previos -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="motivo_consulta">Motivo de Consulta:</label>
                        <textarea name="motivo_consulta" id="motivo_consulta" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tratamientos_previos">Tratamientos Previos:</label>
                        <textarea name="tratamientos_previos" id="tratamientos_previos" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <!-- Traslado - Historial Médico -->
                <div class="card-header mt-3">
                    <h5>Historial Médico</h5>
                </div>
                <div class="form-row">
                    <!-- Columna 1 -->
                    <div class="col-md-4">
                        @foreach(['diabetes' => 'Diabetes', 'alergias' => 'Alergias', 'cancer' => 'Cáncer', 'transfusiones' => 'Transfusiones'] as $field => $label)
                            <div class="form-group">
                                <label>{{ $label }}:</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="Sí"> Sí
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="No"> No
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Columna 2 -->
                    <div class="col-md-4">
                        @foreach(['hta' => 'HTA', 'accidentes' => 'Accidentes', 'encames' => 'Encames', 'cardiopatias' => 'Cardiopatías'] as $field => $label)
                            <div class="form-group">
                                <label>{{ $label }}:</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="Sí"> Sí
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="No"> No
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                       <!-- Columna 3 -->
                    <div class="col-md-4">
                        @foreach(['cirugias' => 'Cirugías', 'contracturas' => 'Contracturas', 'fracturas' => 'Fracturas'] as $field => $label)
                            <div class="form-group">
                                <label>{{ $label }}:</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="Sí"> Sí
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="No"> No
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>

                <!-- Signos Vitales -->
                <div class="card-header mt-3">
                    <h5>Signos Vitales</h5>
                </div>
                <div class="form-row">
                    @foreach(['t/a' => 'T/A', 'temperatura' => 'Temperatura', 'fc' => 'FC', 'fr' => 'FR'] as $field => $label)
                        <div class="form-group col-md-3">
                            <label for="{{ $field }}">{{ $label }}:</label>
                            <textarea name="{{ $field }}" id="{{ $field }}" class="form-control" rows="1"></textarea>
                        </div>
                    @endforeach
                </div>

                <!-- Observaciones -->
                <div class="form-group">
                    <label for="observaciones_antecedentes">Observaciones:</label>
                    <textarea name="observaciones_antecedentes" id="observaciones_antecedentes" class="form-control" rows="3"></textarea>
                </div>
        </div>
<div class="card-header">
    <h5>HÁBITOS DE SALUD</h5>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="tabaquismo">Tabaquismo:</label>
            <div>
                <label><input type="radio" name="tabaquismo" value="Sí"> Sí</label>
                <label><input type="radio" name="tabaquismo" value="No"> No</label>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="drogas">Drogas:</label>
            <div>
                <label><input type="radio" name="drogas" value="Sí"> Sí</label>
                <label><input type="radio" name="drogas" value="No"> No</label>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="automedica">Se automedica:</label>
            <div>
                <label><input type="radio" name="automedica" value="Sí"> Sí</label>
                <label><input type="radio" name="automedica" value="No"> No</label>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="alcoholismo">Alcoholismo:</label>
            <div>
                <label><input type="radio" name="alcoholismo" value="Sí"> Sí</label>
                <label><input type="radio" name="alcoholismo" value="No"> No</label>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="actividad_fisica">Actividad física:</label>
            <div>
                <label><input type="radio" name="actividad_fisica" value="Sí"> Sí</label>
                <label><input type="radio" name="actividad_fisica" value="No"> No</label>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="pasatiempos">Pasatiempos:</label>
            <div>
                <label><input type="radio" name="pasatiempos" value="Sí"> Sí</label>
                <label><input type="radio" name="pasatiempos" value="No"> No</label>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <!-- Grupo A -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>DIAGNOSTICO MEDICO/ REHABILITACION</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="reflejos">Reflejos:</label>
                    <input type="checkbox" name="reflejos" value="1">
                </div>
                <div class="form-group">
                    <label for="sensibilidad">Sensibilidad:</label>
                    <input type="checkbox" name="sensibilidad" value="1">
                </div>
                <div class="form-group">
                    <label for="lenguaje_orientacion">Lenguaje Orientación:</label>
                    <input type="checkbox" name="lenguaje_orientacion" value="1">
                </div>
                <div class="form-group">
                    <label for="otros">Otros:</label>
                    <input type="checkbox" name="otros" value="1">
                </div>
            </div>
        </div>
    </div>

    <!-- Grupo B -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>TRASLADO</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <!-- Fila 1 -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="val_inicial" value="1">
                            <label for="val_inicial">Valoración Inicial:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="independientei" value="1">
                            <label for="independientei">Indepen. Inicial:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="ayudai" value="1">
                            <label for="ayudai">Ayuda Inicial:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="silla_ruedasi" value="1">
                            <label for="silla_ruedasi">Silla de Ruedas Inicial:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="camillai" value="1">
                            <label for="camillai">Camilla Inicial:</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Fila 2 -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="val_final" value="1">
                            <label for="val_final">Valoración Final:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="independientef" value="1">
                            <label for="independientef">Indepen.F:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="ayudaf" value="1">
                            <label for="ayudaf">Ayuda Final:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="silla_ruedasf" value="1">
                            <label for="silla_ruedasf">Silla de Ruedas Final:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="camillaf" value="1">
                            <label for="camillaf">Camilla Final:</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grupo C -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h5>MARCHA / DEAMBULACIÓN</h5>
                </div>
                
                <!-- Fila 1 -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="libre">Libre:</label>
                            <div>
                                <label><input type="radio" name="libre" value="Sí"> Sí</label>
                                <label><input type="radio" name="libre" value="No"> No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="claudicante">Claudicante:</label>
                            <div>
                                <label><input type="radio" name="claudicante" value="Sí"> Sí</label>
                                <label><input type="radio" name="claudicante" value="No"> No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="con_ayuda">Con Ayuda:</label>
                            <div>
                                <label><input type="radio" name="con_ayuda" value="Sí"> Sí</label>
                                <label><input type="radio" name="con_ayuda" value="No"> No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fila 2 -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="espasticas">Espásticas:</label>
                            <div>
                                <label><input type="radio" name="espasticas" value="Sí"> Sí</label>
                                <label><input type="radio" name="espasticas" value="No"> No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ataxica">Atáxica:</label>
                            <div>
                                <label><input type="radio" name="ataxica" value="Sí"> Sí</label>
                                <label><input type="radio" name="ataxica" value="No"> No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="otros2">Otros:</label>
                            <div>
                                <label><input type="radio" name="otros2" value="Sí"> Sí</label>
                                <label><input type="radio" name="otros2" value="No"> No</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Grupo D -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>CICATRIZ QUIRURGICA</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <!-- Fila 1 -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="sitio" value="1">
                            <label for="sitio">Sitio:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="quelaide" value="1">
                            <label for="quelaide">Quelaide:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="retractil" value="1">
                            <label for="retractil">Retractil:</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Fila 2 -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="adherente" value="1">
                            <label for="adherente">Adherente:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="plana" value="1">
                            <label for="plana">Plana:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="checkbox" name="otros3" value="1">
                            <label for="otros3">Otros:</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('antecedentes.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection

@section('js')

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Seleccione una opción",
                allowClear: true
            });
        });
    </script>
@stop