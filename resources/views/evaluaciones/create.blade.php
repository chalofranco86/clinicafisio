@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Crear Evaluación</h2>
    <form action="{{ route('evaluaciones.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="">Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                @endforeach
            </select>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>MSD</th>
                    <th>MSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lanza</td>
                    <td>
                        <select name="msd_lanza" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_lanza" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alcanza</td>
                    <td>
                        <select name="msd_alcanza" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_alcanza" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Coge</td>
                    <td>
                        <select name="msd_coge" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_coge" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Suelta</td>
                    <td>
                        <select name="msd_suelta" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_suelta" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Empuja</td>
                    <td>
                        <select name="msd_empuja" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_empuja" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hala</td>
                    <td>
                        <select name="msd_hala" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_hala" class="form-control">
                            <option value="POCO">POCO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MUCHO">MUCHO</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Evaluación</button>
    </form>
</div>
@endsection
