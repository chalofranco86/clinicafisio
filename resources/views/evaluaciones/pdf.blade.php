<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Evaluación</title>
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
    <h1>Reporte de Evaluación</h1>
    <h2>Paciente: {{ $evaluacion->paciente->nombre }} {{ $evaluacion->paciente->apellido }}</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Campo</th>
                <th>MSD</th>
                <th>MSI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lanza</td>
                <td>{{ $evaluacion->msd_lanza }}</td>
                <td>{{ $evaluacion->msi_lanza }}</td>
            </tr>
            <tr>
                <td>Alcanza</td>
                <td>{{ $evaluacion->msd_alcanza }}</td>
                <td>{{ $evaluacion->msi_alcanza }}</td>
            </tr>
            <tr>
                <td>Coge</td>
                <td>{{ $evaluacion->msd_coge }}</td>
                <td>{{ $evaluacion->msi_coge }}</td>
            </tr>
            <tr>
                <td>Suelta</td>
                <td>{{ $evaluacion->msd_suelta }}</td>
                <td>{{ $evaluacion->msi_suelta }}</td>
            </tr>
            <tr>
                <td>Empuja</td>
                <td>{{ $evaluacion->msd_empuja }}</td>
                <td>{{ $evaluacion->msi_empuja }}</td>
            </tr>
            <tr>
                <td>Hala</td>
                <td>{{ $evaluacion->msd_hala }}</td>
                <td>{{ $evaluacion->msi_hala }}</td>
            </tr>
        </tbody>
    </table>

    <h3>Observaciones:</h3>
    <p>{{ $evaluacion->observaciones }}</p>
</body>
</html>