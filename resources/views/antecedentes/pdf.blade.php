<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Antecedente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }
        h1, h2, h3, h4, h5 {
            margin: 0;
            padding: 0;
        }
        h1 {
            font-size: 16px;
            margin-bottom: 10px;
        }
        h2, h3 {
            font-size: 14px;
            margin-bottom: 8px;
        }
        h4, h5 {
            font-size: 12px;
            margin-bottom: 6px;
        }
        p {
            margin: 0;
            padding: 0;
            margin-bottom: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }
        th, td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }
        .section {
            margin-bottom: 8px;
        }
        .section-header {
            background-color: #f2f2f2;
            padding: 4px;
            font-weight: bold;
        }
        .half-width {
            width: 50%;
            display: inline-block;
            vertical-align: top;
        }
        .third-width {
            width: 33.33%;
            display: inline-block;
            vertical-align: top;
        }
        .quarter-width {
            width: 25%;
            display: inline-block;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <h1>Reporte de Antecedente</h1>
    <div class="flex-container">
        <div class="flex-item">
            <div class="section">
                <div class="section-header">Información del Paciente y Terapeuta</div>
                <div class="half-width">
                    <p><strong>Paciente:</strong> {{ $antecedente->paciente->nombre }}</p>
                </div>
                <div class="half-width">
                    <p><strong>Terapeuta:</strong> {{ $antecedente->medico->nombre }}</p>
                </div>
                <div class="half-width">
                    <p><strong>Fecha:</strong> {{ $antecedente->fecha_antecedente }}</p>
                </div>
            </div>
        </div>
        <div class="flex-item">
            <div class="section">
                <div class="section-header">Motivo y Tratamientos Previos</div>
                <div class="half-width">
                    <p><strong>Motivo de Consulta:</strong> {{ $antecedente->motivo_consulta }}</p>
                </div>
                <div class="half-width">
                    <p><strong>Tratamientos Previos:</strong> {{ $antecedente->tratamientos_previos }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-header">Historial Médico</div>
        <table>
            <thead>
                <tr>
                    <th>Condición</th>
                    <th>Presencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach(['diabetes' => 'Diabetes', 'alergias' => 'Alergias', 'cancer' => 'Cáncer', 'transfusiones' => 'Transfusiones', 'hta' => 'HTA', 'accidentes' => 'Accidentes', 'encames' => 'Encames', 'cardiopatias' => 'Cardiopatías', 'cirugias' => 'Cirugías', 'contracturas' => 'Contracturas', 'fracturas' => 'Fracturas'] as $field => $label)
                    <tr>
                        <td>{{ $label }}</td>
                        <td>{{ $antecedente->$field ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Signos Vitales</div>
        <table>
            <thead>
                <tr>
                    <th>Signo</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach(['t/a' => 'T/A', 'temperatura' => 'Temperatura', 'fc' => 'FC', 'fr' => 'FR'] as $field => $label)
                    <tr>
                        <td>{{ $label }}</td>
                        <td>{{ $antecedente->$field }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Hábitos de Salud</div>
        <table>
            <thead>
                <tr>
                    <th>Hábito</th>
                    <th>Presencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach(['tabaquismo' => 'Tabaquismo', 'drogas' => 'Drogas', 'automedica' => 'Se automedica', 'alcoholismo' => 'Alcoholismo', 'actividad_fisica' => 'Actividad física', 'pasatiempos' => 'Pasatiempos'] as $field => $label)
                    <tr>
                        <td>{{ $label }}</td>
                        <td>{{ $antecedente->$field ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Diagnóstico Médico / Rehabilitación</div>
        <table>
            <thead>
                <tr>
                    <th>Diagnóstico</th>
                    <th>Presencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach(['reflejos' => 'Reflejos', 'sensibilidad' => 'Sensibilidad', 'lenguaje_orientacion' => 'Lenguaje Orientación', 'otros' => 'Otros'] as $field => $label)
                    <tr>
                        <td>{{ $label }}</td>
                        <td>{{ $antecedente->$field ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Traslado</div>
        <table>
            <thead>
                <tr>
                    <th>Condición</th>
                    <th>Inicial</th>
                    <th>Final</th>
                </tr>
            </thead>
            <tbody>
                @foreach(['val_inicial' => 'Valoración Inicial', 'independientei' => 'Independiente Inicial', 'ayudai' => 'Ayuda Inicial', 'silla_ruedasi' => 'Silla de Ruedas Inicial', 'camillai' => 'Camilla Inicial', 'val_final' => 'Valoración Final', 'independientef' => 'Independiente Final', 'ayudaf' => 'Ayuda Final'] as $field => $label)
                    <tr>
                        <td>{{ $label }}</td>
                        <td>{{ $antecedente->$field ? 'Sí' : 'No' }}</td>
                        <td>{{ $antecedente->$field ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-header">Observaciones</div>
        <p>{{ $antecedente->observaciones_antecedentes }}</p>
    </div>
</body>
</html>