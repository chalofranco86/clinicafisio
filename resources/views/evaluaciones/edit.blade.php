@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Editar Evaluación</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('evaluaciones.update', $evaluacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="">Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $evaluacion->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nombre }} {{ $paciente->apellido }}
                    </option>
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
                            <option value="POCO" {{ $evaluacion->msd_lanza == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msd_lanza == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msd_lanza == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_lanza" class="form-control">
                            <option value="POCO" {{ $evaluacion->msi_lanza == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msi_lanza == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msi_lanza == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alcanza</td>
                    <td>
                        <select name="msd_alcanza" class="form-control">
                            <option value="POCO" {{ $evaluacion->msd_alcanza == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msd_alcanza == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msd_alcanza == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_alcanza" class="form-control">
                            <option value="POCO" {{ $evaluacion->msi_alcanza == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msi_alcanza == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msi_alcanza == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Coge</td>
                    <td>
                        <select name="msd_coge" class="form-control">
                            <option value="POCO" {{ $evaluacion->msd_coge == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msd_coge == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msd_coge == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_coge" class="form-control">
                            <option value="POCO" {{ $evaluacion->msi_coge == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msi_coge == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msi_coge == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Suelta</td>
                    <td>
                        <select name="msd_suelta" class="form-control">
                            <option value="POCO" {{ $evaluacion->msd_suelta == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msd_suelta == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msd_suelta == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_suelta" class="form-control">
                            <option value="POCO" {{ $evaluacion->msi_suelta == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msi_suelta == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msi_suelta == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Empuja</td>
                    <td>
                        <select name="msd_empuja" class="form-control">
                            <option value="POCO" {{ $evaluacion->msd_empuja == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msd_empuja == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msd_empuja == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_empuja" class="form-control">
                            <option value="POCO" {{ $evaluacion->msi_empuja == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msi_empuja == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msi_empuja == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hala</td>
                    <td>
                        <select name="msd_hala" class="form-control">
                            <option value="POCO" {{ $evaluacion->msd_hala == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msd_hala == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msd_hala == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                    <td>
                        <select name="msi_hala" class="form-control">
                            <option value="POCO" {{ $evaluacion->msi_hala == 'POCO' ? 'selected' : '' }}>POCO</option>
                            <option value="MEDIO" {{ $evaluacion->msi_hala == 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                            <option value="MUCHO" {{ $evaluacion->msi_hala == 'MUCHO' ? 'selected' : '' }}>MUCHO</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control">{{ $evaluacion->observaciones }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Evaluación</button>
    </form>
</div>
@endsection