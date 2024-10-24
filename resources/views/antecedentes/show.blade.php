@extends('adminlte::page')

@section('title', 'Ver Antecedente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Antecedente</h3>
        </div>
        <div class="card-body">
            <!-- 1. Información del Paciente y Terapeuta -->
            <div class="card-header mt-3">
                <h5>Información del Paciente y Terapeuta</h5>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Paciente:</label>
                    <p>{{ $antecedente->paciente->nombre }}</p>
                </div>
                <div class="form-group col-md-4">
                    <label>Terapeuta:</label>
                    <p>{{ $antecedente->medico->nombre }}</p>
                </div>
                <div class="form-group col-md-4">
                    <label>Fecha:</label>
                    <p>{{ $antecedente->fecha_antecedente }}</p>
                </div>
            </div>

            <!-- 2. Detalles del Motivo y Tratamientos Previos -->
            <div class="card-header mt-3">
                <h5>Motivo y Tratamientos Previos</h5>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Motivo de Consulta:</label>
                    <p>{{ $antecedente->motivo_consulta }}</p>
                </div>
                <div class="form-group col-md-6">
                    <label>Tratamientos Previos:</label>
                    <p>{{ $antecedente->tratamientos_previos }}</p>
                </div>
            </div>

            <!-- 3. Historial Médico -->
            <div class="card-header mt-3">
                <h5>Historial Médico</h5>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    @foreach(['diabetes' => 'Diabetes', 'alergias' => 'Alergias', 'cancer' => 'Cáncer', 'transfusiones' => 'Transfusiones'] as $field => $label)
                        <div class="form-group">
                            <label>{{ $label }}:</label>
                            <p>{{ $antecedente->$field ? 'Sí' : 'No' }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    @foreach(['hta' => 'HTA', 'accidentes' => 'Accidentes', 'encames' => 'Encames', 'cardiopatias' => 'Cardiopatías'] as $field => $label)
                        <div class="form-group">
                            <label>{{ $label }}:</label>
                            <p>{{ $antecedente->$field ? 'Sí' : 'No' }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    @foreach(['cirugias' => 'Cirugías', 'contracturas' => 'Contracturas', 'fracturas' => 'Fracturas'] as $field => $label)
                        <div class="form-group">
                            <label>{{ $label }}:</label>
                            <p>{{ $antecedente->$field ? 'Sí' : 'No' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 4. Signos Vitales -->
            <div class="card-header mt-3">
                <h5>Signos Vitales</h5>
            </div>
            <div class="form-row">
                @foreach(['t/a' => 'T/A', 'temperatura' => 'Temperatura', 'fc' => 'FC', 'fr' => 'FR'] as $field => $label)
                    <div class="form-group col-md-3">
                        <label>{{ $label }}:</label>
                        <p>{{ $antecedente->$field }}</p>
                    </div>
                @endforeach
            </div>

            <!-- 5. Hábitos de Salud -->
            <div class="card-header mt-3">
                <h5>Hábitos de Salud</h5>
            </div>
            <div class="form-row">
                @foreach(['tabaquismo' => 'Tabaquismo', 'drogas' => 'Drogas', 'automedica' => 'Se automedica', 'alcoholismo' => 'Alcoholismo', 'actividad_fisica' => 'Actividad física', 'pasatiempos' => 'Pasatiempos'] as $field => $label)
                    <div class="form-group col-md-2">
                        <label>{{ $label }}:</label>
                        <p>{{ $antecedente->$field ? 'Sí' : 'No' }}</p>
                    </div>
                @endforeach
            </div>

            <!-- 6. Diagnóstico Médico / Rehabilitación -->
            <div class="card-header mt-3">
                <h5>Diagnóstico Médico / Rehabilitación</h5>
            </div>
            <div class="form-row">
                @foreach(['reflejos' => 'Reflejos', 'sensibilidad' => 'Sensibilidad', 'lenguaje_orientacion' => 'Lenguaje Orientación', 'otros' => 'Otros'] as $field => $label)
                    <div class="form-group col-md-3">
                        <label>{{ $label }}:</label>
                        <p>{{ $antecedente->$field ? 'Sí' : 'No' }}</p>
                    </div>
                @endforeach
            </div>

            <!-- 7. Traslado -->
            <div class="card-header mt-3">
                <h5>Traslado</h5>
            </div>
            <div class="form-row">
                @foreach(['val_inicial' => 'Valoración Inicial', 'independientei' => 'Independiente Inicial', 'ayudai' => 'Ayuda Inicial', 'silla_ruedasi' => 'Silla de Ruedas Inicial', 'camillai' => 'Camilla Inicial'] as $field => $label)
                    <div class="form-group col-md-3">
                        <label>{{ $label }}:</label>
                        <p>{{ $antecedente->$field ? 'Sí' : 'No' }}</p>
                    </div>
                @endforeach
            </div>
            <div class="form-row">
                @foreach(['val_final' => 'Valoración Final', 'independientef' => 'Independiente Final', 'ayudaf' => 'Ayuda Final'] as $field => $label)
                    <div class="form-group col-md-3">
                        <label>{{ $label }}:</label>
                        <p>{{ $antecedente->$field ? 'Sí' : 'No' }}</p>
                    </div>
                @endforeach
            </div>

            <!-- 8. Observaciones -->
            <div class="form-group mt-3">
                <label>Observaciones:</label>
                <p>{{ $antecedente->observaciones_antecedentes }}</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('antecedentes.index') }}" class="btn btn-default">Regresar</a>
                <a href="{{ route('antecedentes.pdf', $antecedente->id) }}" class="btn btn-secondary">Generar PDF</a>
            </div>
        </div>
    </div>
@endsection