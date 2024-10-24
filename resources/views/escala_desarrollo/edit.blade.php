@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Editar Escala de Desarrollo</h1>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('escala_desarrollo.update', $escala->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Selección del paciente -->
        <div class="form-group">
            <label for="paciente_id">Paciente:</label>
            <select name="paciente_id" class="form-control" required>
                <option value="">Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $escala->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nombre }} {{ $paciente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="medico_id">Terapeuta:</label>
            <select name="medico_id" class="form-control" required>
                <option value="">Seleccione un Terapeuta</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $escala->medico_id == $medico->id ? 'selected' : '' }}>
                        {{ $medico->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>FASE</th>
                    <th>Motora Gruesa</th>
                    <th>Motora Fina</th>
                    <th>Cognoscitiva</th>
                    <th>Lenguaje</th>
                    <th>Socio Afectiva</th>
                    <th>Hábitos de Salud y Nutrición</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Años 4-5</td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_gruesa_4_5" value="1" {{ $escala->motora_gruesa_4_5 ? 'checked' : '' }}> Saltar hacia atras por imitación (90.6%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_fina_4_5" value="1" {{ $escala->motora_fina_4_5 ? 'checked' : '' }}> Toca con el pulgar los demás dedos de la mano (90.6%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="cognoscitiva_4_5" value="1" {{ $escala->cognoscitiva_4_5 ? 'checked' : '' }}> Dibuja una figura humana con 4 partes (71.9%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="lenguaje_4_5" value="1" {{ $escala->lenguaje_4_5 ? 'checked' : '' }}> Emplea verbos en pasado
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="socio_afectiva_4_5" value="1" {{ $escala->socio_afectiva_4_5 ? 'checked' : '' }}> Participa en actividades de grupo (84.4%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="habitos_salud_4_5" value="1" {{ $escala->habitos_salud_4_5 ? 'checked' : '' }}> Cepilla sus dientes sin ayuda (75%)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Años 3-4</td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_gruesa_3_4" value="1" {{ $escala->motora_gruesa_3_4 ? 'checked' : '' }}> Saltar sobre un pie 2 o más veces (71.9%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_fina_3_4" value="1" {{ $escala->motora_fina_3_4 ? 'checked' : '' }}> Construye puentes con 3 cubos (94.9%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="cognoscitiva_3_4" value="1" {{ $escala->cognoscitiva_3_4 ? 'checked' : '' }}> Dice si un objeto es blando o duro (76.1%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="lenguaje_3_4" value="1" {{ $escala->lenguaje_3_4 ? 'checked' : '' }}> Oraciones de 6 a 7 palabras (90.9%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="socio_afectiva_3_4" value="1" {{ $escala->socio_afectiva_3_4 ? 'checked' : '' }}> Dice su sexo (75%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="habitos_salud_3_4" value="1" {{ $escala->habitos_salud_3_4 ? 'checked' : '' }}> Se lava y seca su cara solo (90.6%)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Años 2-3</td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_gruesa_2_3" value="1" {{ $escala->motora_gruesa_2_3 ? 'checked' : '' }}> Se mantiene de pie con los talones juntos
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_fina_2_3" value="1" {{ $escala->motora_fina_2_3 ? 'checked' : '' }}> Ensarta cuentas en un cordón (91%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="cognoscitiva_2_3" value="1" {{ $escala->cognoscitiva_2_3 ? 'checked' : '' }}> Coloca un cubo encima y debajo de un objeto (84.4%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="lenguaje_2_3" value="1" {{ $escala->lenguaje_2_3 ? 'checked' : '' }}> Usa algunos plurales (75%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="socio_afectiva_2_3" value="1" {{ $escala->socio_afectiva_2_3 ? 'checked' : '' }}> Dice su nombre (84.4%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="habitos_salud_2_3" value="1" {{ $escala->habitos_salud_2_3 ? 'checked' : '' }}> Avisa cuando quiere orinar o defecar (87.5%)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Años 2-2.5</td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_gruesa_2_25" value="1" {{ $escala->motora_gruesa_2_25 ? 'checked' : '' }}> Se para en un solo pie con ayuda (84.4%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_fina_2_25" value="1" {{ $escala->motora_fina_2_25 ? 'checked' : '' }}> Construye una torre de 4 a 6 cubos (90.9%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="cognoscitiva_2_25" value="1" {{ $escala->cognoscitiva_2_25 ? 'checked' : '' }}> Señala 3 partes del cuerpo (93.2%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="lenguaje_2_25" value="1" {{ $escala->lenguaje_2_25 ? 'checked' : '' }}> Construye frases (84.4%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="socio_afectiva_2_25" value="1" {{ $escala->socio_afectiva_2_25 ? 'checked' : '' }}> Comparte sus juguetes (90.6%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="habitos_salud_2_25" value="1" {{ $escala->habitos_salud_2_25 ? 'checked' : '' }}> Colabora cuando se baña (90.5%)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Años 1.5-2</td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_gruesa_15_2" value="1" {{ $escala->motora_gruesa_15_2 ? 'checked' : '' }}> Acostado boca arriba se pone de pie sin apoyarse (84.6%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_fina_15_2" value="1" {{ $escala->motora_fina_15_2 ? 'checked' : '' }}> Construye torre de 2 a 3 cubos por imitación (96.9%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="cognoscitiva_15_2" value="1" {{ $escala->cognoscitiva_15_2 ? 'checked' : '' }}> Busca objeto escondido por el examinador (sin que haya visto donde) (84.4%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="lenguaje_15_2" value="1" {{ $escala->lenguaje_15_2 ? 'checked' : '' }}> Sigue dos ordenes consecutivas (93.8%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="socio_afectiva_15_2" value="1" {{ $escala->socio_afectiva_15_2 ? 'checked' : '' }}> Hace berrinche cuando no se le da lo que quiere (84.4%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="habitos_salud_15_2" value="1" {{ $escala->habitos_salud_15_2 ? 'checked' : '' }}> Indica en forma verbal o no verbal que su pañal está sucio (95.3%)
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Años 1-1.5</td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_gruesa_1_15" value="1" {{ $escala->motora_gruesa_1_15 ? 'checked' : '' }}> Da unos pasos solo (89.9%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="motora_fina_1_15" value="1" {{ $escala->motora_fina_1_15 ? 'checked' : '' }}> Hace garabatos tomando lápiz con toda la mano (89.4%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="cognoscitiva_1_15" value="1" {{ $escala->cognoscitiva_1_15 ? 'checked' : '' }}> Recupera objetos escondidos bajo su pañal y taza (86.5%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="lenguaje_1_15" value="1" {{ $escala->lenguaje_1_15 ? 'checked' : '' }}> Dice 2 a 8 palabras (89.9%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="socio_afectiva_1_15" value="1" {{ $escala->socio_afectiva_1_15 ? 'checked' : '' }}> Juega solo (93%) Reconoce a los familiares (87.5%)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" name="habitos_salud_1_15" value="1" {{ $escala->habitos_salud_1_15 ? 'checked' : '' }}> Trata de usar la cuchara para comer (93.5%)
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Botón para enviar el formulario -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar Escala</button>
        </div>
    </form>
</div>
@endsection