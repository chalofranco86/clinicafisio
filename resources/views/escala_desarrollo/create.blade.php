@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Crear Nueva Escala de Desarrollo</h1>

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

    <form action="{{ route('escala_desarrollo.store') }}" method="POST">
        @csrf

        <!-- Selección del paciente -->
        <div class="form-group">
            <label for="paciente_id">Paciente:</label>
            <select name="paciente_id" class="form-control" required>
                <option value="">Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="medico_id">Terapeuta:</label>
            <select name="medico_id" class="form-control" required>
                <option value="">Seleccione un Terapeuta</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
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
                    <input type="checkbox" name="motora_gruesa_4_5" value="1"> Saltar hacia atras por imitación (90.6%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="motora_fina_4_5" value="1"> Toca con el pulgar los demás dedos de la mano (90.6%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="cognoscitiva_4_5" value="1"> Dibuja una figura humana con 4 partes (71.9%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="lenguaje_4_5" value="1"> Emplea verbos en pasado
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="socio_afectiva_4_5" value="1"> Participa en actividades de grupo (84.4%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="habitos_salud_4_5" value="1"> Cepilla sus dientes sin ayuda (75%)
                </label>
            </td>
        </tr>
        <tr>
            <td>Años 3-4</td>
            <td>
                <label>
                    <input type="checkbox" name="motora_gruesa_3_4" value="1"> Saltar sobre un pie 2 o más veces (71.9%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="motora_fina_3_4" value="1"> Construye puentes con 3 cubos (94.9%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="cognoscitiva_3_4" value="1"> Dice si un objeto es blando o duro (76.1%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="lenguaje_3_4" value="1"> Oraciones de 6 a 7 palabras (90.9%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="socio_afectiva_3_4" value="1"> Dice su sexo (75%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="habitos_salud_3_4" value="1"> Se lava y seca su cara solo (90.6%)
                </label>
            </td>
        </tr>
        <tr>
            <td>Años 2-3</td>
            <td>
                <label>
                    <input type="checkbox" name="motora_gruesa_2_3" value="1"> Se mantiene de pie con los talones juntos
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="motora_fina_2_3" value="1"> Ensarta cuentas en un cordón (91%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="cognoscitiva_2_3" value="1"> Coloca un cubo encima y debajo de un objeto (84.4%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="lenguaje_2_3" value="1"> Usa algunos plurales (75%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="socio_afectiva_2_3" value="1"> Dice su nombre (84.4%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="habitos_salud_2_3" value="1"> Avisa cuando quiere orinar o defecar (87.5%)
                </label>
            </td>
        </tr>
        <tr>
            <td>Años 2-2.5</td>
            <td>
                <label>
                    <input type="checkbox" name="motora_gruesa_2_25" value="1"> Se para en un solo pie con ayuda (84.4%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="motora_fina_2_25" value="1"> Construye una torre de 4 a 6 cubos (90.9%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="cognoscitiva_2_25" value="1"> Señala 3 partes del cuerpo (93.2%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="lenguaje_2_25" value="1"> Construye frases (84.4%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="socio_afectiva_2_25" value="1"> Comparte sus juguetes (90.6%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="habitos_salud_2_25" value="1"> Colabora cuando se baña (90.5%)
                </label>
            </td>
        </tr>
        <tr>
            <td>Años 1.5-2</td>
            <td>
                <label>
                    <input type="checkbox" name="motora_gruesa_15_2" value="1"> Acostado boca arriba se pone de pie sin apoyarse (84.6%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="motora_fina_15_2" value="1"> Construye torre de 2 a 3 cubos por imitación (96.9%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="cognoscitiva_15_2" value="1"> Busca objeto escondido por el examinador (sin que haya visto donde) (84.4%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="lenguaje_15_2" value="1"> Sigue dos ordenes consecutivas (93.8%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="socio_afectiva_15_2" value="1"> Hace berrinche cuando no se le da lo que quiere (84.4%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="habitos_salud_15_2" value="1"> Indica en forma verbal o no verbal que su pañal está sucio (95.3%)
                </label>
            </td>
        </tr>
        <tr>
            <td>Años 1-1.5</td>
            <td>
                <label>
                    <input type="checkbox" name="motora_gruesa_1_15" value="1"> Da unos pasos solo (89.9%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="motora_fina_1_15" value="1"> Hace garabatos tomando lápiz con toda la mano (89.4%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="cognoscitiva_1_15" value="1"> Recupera objetos escondidos bajo su pañal y taza (86.5%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="lenguaje_1_15" value="1"> Dice 2 a 8 palabras (89.9%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="socio_afectiva_1_15" value="1"> Juega solo (93%) Reconoce a los familiares (87.5%)
                </label>
            </td>
            <td>
                <label>
                    <input type="checkbox" name="habitos_salud_1_15" value="1"> Trata de usar la cuchara para comer (93.5%)
                </label>
            </td>
        </tr>
    </tbody>
</table>

        <!-- ... -->

        <!-- Botón para enviar el formulario -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar Escala</button>
        </div>
    </form>
</div>
@endsection
