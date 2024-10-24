<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Entrevista Pediátrica</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h1, h2, h3 {
            text-align: center;
            color: #2C3E50;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }
        h3 {
            font-size: 16px;
            margin-bottom: 20px;
        }

        /* Estilo de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #2C3E50;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        /* Estilo para las celdas */
        td {
            font-size: 14px;
        }
        .table-title {
            background-color: #2C3E50;
            color: white;
            padding: 10px;
            font-size: 18px;
            text-align: center;
        }

        /* Ajustes para títulos y secciones */
        .section-title {
            font-size: 18px;
            color: #2980B9;
            margin-top: 30px;
            margin-bottom: 10px;
            text-align: left;
        }

    </style>
</head>
<body>
    <!-- Título del reporte -->
    <h1>Reporte de Entrevista Pediátrica</h1>
    
    <!-- Información del paciente -->
    <div>
        <h2>Paciente: {{ $entrevista->paciente->nombre }}</h2>
        <h3>Edad: {{ $entrevista->paciente->edad }} años</h3>
        <h3>Fecha de la Entrevista: {{ $entrevista->created_at->format('d/m/Y') }}</h3>
    </div>

    <!-- Tabla con la información de la entrevista -->
    <table>
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Motivo de la Consulta</td>
                <td>{{ $entrevista->motivo_consulta }}</td>
            </tr>
            <tr>
                <td>Aparición</td>
                <td>{{ $entrevista->aparicion }}</td>
            </tr>
            <!-- Puedes añadir más filas según sea necesario -->
        </tbody>
    </table>

    <!-- Sección adicional para notas u observaciones -->
    <div class="section-title">Observaciones</div>
    <div>
        <p>{{ $entrevista->observaciones ?? 'Sin observaciones' }}</p>
    </div>

</body>
</html>
