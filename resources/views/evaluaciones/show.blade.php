@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles de Evaluación</h1>
    <td>{{ $evaluacion->paciente->nombre }} {{ $evaluacion->paciente->apellido }}</td>

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

    <a href="{{ route('evaluaciones.index') }}" class="btn btn-primary">Regresar a Evaluaciones</a>
    <a href="{{ route('evaluaciones.pdf', $evaluacion->id) }}" class="btn btn-secondary">Generar PDF</a>
</div>
@endsection