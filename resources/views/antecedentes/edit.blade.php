@extends('adminlte::page')

@section('title', 'Editar Antecedente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Antecedente</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('antecedentes.update', $antecedente->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Información del Paciente y Terapeuta -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="paciente_id">Paciente:</label>
                        <select name="paciente_id" id="paciente_id" class="form-control select2">
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" {{ $paciente->id == $antecedente->paciente_id ? 'selected' : '' }}>
                                    {{ $paciente->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="medico_id">Terapeuta:</label>
                        <select name="medico_id" id="medico_id" class="form-control select2">
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}" {{ $medico->id == $antecedente->medico_id ? 'selected' : '' }}>
                                    {{ $medico->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fecha_antecedente">Fecha:</label>
                        <input type="date" name="fecha_antecedente" id="fecha_antecedente" class="form-control" value="{{ $antecedente->fecha_antecedente }}" required>
                    </div>
                </div>

                <!-- Motivo y Tratamientos Previos -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="motivo_consulta">Motivo de Consulta:</label>
                        <textarea name="motivo_consulta" id="motivo_consulta" class="form-control" rows="3">{{ $antecedente->motivo_consulta }}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tratamientos_previos">Tratamientos Previos:</label>
                        <textarea name="tratamientos_previos" id="tratamientos_previos" class="form-control" rows="3">{{ $antecedente->tratamientos_previos }}</textarea>
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
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="Sí" {{ $antecedente->$field == 'Sí' ? 'checked' : '' }}> Sí
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="No" {{ $antecedente->$field == 'No' ? 'checked' : '' }}> No
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
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="Sí" {{ $antecedente->$field == 'Sí' ? 'checked' : '' }}> Sí
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="No" {{ $antecedente->$field == 'No' ? 'checked' : '' }}> No
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
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="Sí" {{ $antecedente->$field == 'Sí' ? 'checked' : '' }}> Sí
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="{{ $field }}" value="No" {{ $antecedente->$field == 'No' ? 'checked' : '' }}> No
                                    </label>
                                </div>
                            </div>
                        @endforeach
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
                            <textarea name="{{ $field }}" id="{{ $field }}" class="form-control" rows="1">{{ $antecedente->$field }}</textarea>
                        </div>
                    @endforeach
                </div>

                <!-- Observaciones -->
                <div class="form-group">
                    <label for="observaciones_antecedentes">Observaciones:</label>
                    <textarea name="observaciones_antecedentes" id="observaciones_antecedentes" class="form-control" rows="3">{{ $antecedente->observaciones_antecedentes }}</textarea>
                </div>

                <!-- Hábitos de Salud -->
                <div class="card-header">
                    <h5>HÁBITOS DE SALUD</h5>
                </div>
                <div class="row">
                    @foreach(['tabaquismo' => 'Tabaquismo', 'drogas' => 'Drogas', 'automedica' => 'Se automedica', 'alcoholismo' => 'Alcoholismo', 'actividad_fisica' => 'Actividad física', 'pasatiempos' => 'Pasatiempos'] as $field => $label)
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="{{ $field }}">{{ $label }}:</label>
                                <div>
                                    <label><input type="radio" name="{{ $field }}" value="Sí" {{ $antecedente->$field == 'Sí' ? 'checked' : '' }}> Sí</label>
                                    <label><input type="radio" name="{{ $field }}" value="No" {{ $antecedente->$field == 'No' ? 'checked' : '' }}> No</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Diagnóstico Médico / Rehabilitación -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>DIAGNOSTICO MEDICO/ REHABILITACION</h5>
                            </div>
                            <div class="card-body">
                                @foreach(['reflejos' => 'Reflejos', 'sensibilidad' => 'Sensibilidad', 'lenguaje_orientacion' => 'Lenguaje Orientación', 'otros' => 'Otros'] as $field => $label)
                                    <div class="form-group">
                                        <label for="{{ $field }}">{{ $label }}:</label>
                                        <input type="checkbox" name="{{ $field }}" value="1" {{ $antecedente->$field ? 'checked' : '' }}>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Traslado -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>TRASLADO</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    @foreach(['val_inicial' => 'Valoración Inicial', 'independientei' => 'Indepen. Inicial', 'ayudai' => 'Ayuda Inicial', 'silla_ruedasi' => 'Silla de Ruedas Inicial', 'camillai' => 'Camilla Inicial'] as $field => $label)
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="checkbox" name="{{ $field }}" value="1" {{ $antecedente->$field ? 'checked' : '' }}>
                                                <label for="{{ $field }}">{{ $label }}:</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-row">
                                    @foreach(['val_final' => 'Valoración Final', 'independientef' => 'Indepen.F', 'ayudaf' => 'Ayuda Final', 'silla_ruedasf' => 'Silla de Ruedas Final', 'camillaf' => 'Camilla Final'] as $field => $label)
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="checkbox" name="{{ $field }}" value="1" {{ $antecedente->$field ? 'checked' : '' }}>
                                                <label for="{{ $field }}">{{ $label }}:</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Marcha / Deambulación -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h5>MARCHA / DEAMBULACIÓN</h5>
                                </div>
                                <div class="row">
                                    @foreach(['libre' => 'Libre', 'claudicante' => 'Claudicante', 'con_ayuda' => 'Con Ayuda'] as $field => $label)
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="{{ $field }}">{{ $label }}:</label>
                                                <div>
                                                    <label><input type="radio" name="{{ $field }}" value="Sí" {{ $antecedente->$field == 'Sí' ? 'checked' : '' }}> Sí</label>
                                                    <label><input type="radio" name="{{ $field }}" value="No" {{ $antecedente->$field == 'No' ? 'checked' : '' }}> No</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach(['espasticas' => 'Espásticas', 'ataxica' => 'Atáxica', 'otros2' => 'Otros'] as $field => $label)
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="{{ $field }}">{{ $label }}:</label>
                                                <div>
                                                    <label><input type="radio" name="{{ $field }}" value="Sí" {{ $antecedente->$field == 'Sí' ? 'checked' : '' }}> Sí</label>
                                                    <label><input type="radio" name="{{ $field }}" value="No" {{ $antecedente->$field == 'No' ? 'checked' : '' }}> No</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cicatriz Quirúrgica -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>CICATRIZ QUIRURGICA</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    @foreach(['sitio' => 'Sitio', 'quelaide' => 'Quelaide', 'retractil' => 'Retractil'] as $field => $label)
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="checkbox" name="{{ $field }}" value="1" {{ $antecedente->$field ? 'checked' : '' }}>
                                                <label for="{{ $field }}">{{ $label }}:</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-row">
                                    @foreach(['adherente' => 'Adherente', 'plana' => 'Plana', 'otros3' => 'Otros'] as $field => $label)
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="checkbox" name="{{ $field }}" value="1" {{ $antecedente->$field ? 'checked' : '' }}>
                                                <label for="{{ $field }}">{{ $label }}:</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
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