@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles de la Escala de Desarrollo</h1>

    <!-- Información del paciente y terapeuta -->
    <div class="form-group">
        <label for="paciente_id">Paciente:</label>
        <p>{{ $escala->paciente->nombre }} {{ $escala->paciente->apellido }}</p>
    </div>
    
    <div class="form-group">
        <label for="medico_id">Terapeuta:</label>
        <p>{{ $escala->medico->nombre }}</p>
    </div>

    <!-- Tabla con las áreas de desarrollo -->
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
                <td>{{ $escala->motora_gruesa_4_5 ? 'Saltar hacia atrás por imitación (90.6%)' : 'No' }}</td>
                <td>{{ $escala->motora_fina_4_5 ? 'Toca con el pulgar los demás dedos de la mano (90.6%)' : 'No' }}</td>
                <td>{{ $escala->cognoscitiva_4_5 ? 'Dibuja una figura humana con 4 partes (71.9%)' : 'No' }}</td>
                <td>{{ $escala->lenguaje_4_5 ? 'Emplea verbos en pasado' : 'No' }}</td>
                <td>{{ $escala->socio_afectiva_4_5 ? 'Participa en actividades de grupo (84.4%)' : 'No' }}</td>
                <td>{{ $escala->habitos_salud_4_5 ? 'Cepilla sus dientes sin ayuda (75%)' : 'No' }}</td>
            </tr>
            <tr>
                <td>Años 3-4</td>
                <td>{{ $escala->motora_gruesa_3_4 ? 'Saltar sobre un pie 2 o más veces (71.9%)' : 'No' }}</td>
                <td>{{ $escala->motora_fina_3_4 ? 'Construye puentes con 3 cubos (94.9%)' : 'No' }}</td>
                <td>{{ $escala->cognoscitiva_3_4 ? 'Dice si un objeto es blando o duro (76.1%)' : 'No' }}</td>
                <td>{{ $escala->lenguaje_3_4 ? 'Oraciones de 6 a 7 palabras (90.9%)' : 'No' }}</td>
                <td>{{ $escala->socio_afectiva_3_4 ? 'Dice su sexo (75%)' : 'No' }}</td>
                <td>{{ $escala->habitos_salud_3_4 ? 'Se lava y seca su cara solo (90.6%)' : 'No' }}</td>
            </tr>
            <!-- Fila 2-3 años -->
            <tr>
                <td>Años 2-3</td>
                <td>{{ $escala->motora_gruesa_2_3 ? 'Saltar con los dos pies (88.5%)' : 'No' }}</td>
                <td>{{ $escala->motora_fina_2_3 ? 'Ensarta cuentas en un hilo (88.5%)' : 'No' }}</td>
                <td>{{ $escala->cognoscitiva_2_3 ? 'Identifica colores básicos (74.3%)' : 'No' }}</td>
                <td>{{ $escala->lenguaje_2_3 ? 'Forma frases de 3 palabras' : 'No' }}</td>
                <td>{{ $escala->socio_afectiva_2_3 ? 'Juega junto a otros niños (83.9%)' : 'No' }}</td>
                <td>{{ $escala->habitos_salud_2_3 ? 'Se pone y quita la ropa (74.3%)' : 'No' }}</td>
            </tr>
            <!-- Fila 2-2.5 años -->
            <tr>
                <td>Años 2-2.5</td>
                <td>{{ $escala->motora_gruesa_2_25 ? 'Corre con agilidad (86.4%)' : 'No' }}</td>
                <td>{{ $escala->motora_fina_2_25 ? 'Apila 6 bloques (86.4%)' : 'No' }}</td>
                <td>{{ $escala->cognoscitiva_2_25 ? 'Agrupa objetos por forma (80.4%)' : 'No' }}</td>
                <td>{{ $escala->lenguaje_2_25 ? 'Responde a preguntas simples' : 'No' }}</td>
                <td>{{ $escala->socio_afectiva_2_25 ? 'Imita actividades del hogar (82.4%)' : 'No' }}</td>
                <td>{{ $escala->habitos_salud_2_25 ? 'Come solo con cuchara (78.5%)' : 'No' }}</td>
            </tr>
            <!-- Fila 1.5-2 años -->
            <tr>
                <td>Años 1.5-2</td>
                <td>{{ $escala->motora_gruesa_15_2 ? 'Camina hacia atrás (83.2%)' : 'No' }}</td>
                <td>{{ $escala->motora_fina_15_2 ? 'Garabatea en un papel (83.2%)' : 'No' }}</td>
                <td>{{ $escala->cognoscitiva_15_2 ? 'Identifica partes del cuerpo (76.1%)' : 'No' }}</td>
                <td>{{ $escala->lenguaje_15_2 ? 'Usa al menos 10 palabras' : 'No' }}</td>
                <td>{{ $escala->socio_afectiva_15_2 ? 'Juega a dar de comer a una muñeca (80.3%)' : 'No' }}</td>
                <td>{{ $escala->habitos_salud_15_2 ? 'Intenta cepillarse los dientes (73.1%)' : 'No' }}</td>
            </tr>
            <!-- Fila 1-1.5 años -->
            <tr>
                <td>Años 1-1.5</td>
                <td>{{ $escala->motora_gruesa_1_15 ? 'Camina solo (75.9%)' : 'No' }}</td>
                <td>{{ $escala->motora_fina_1_15 ? 'Sujeta objetos pequeños con los dedos (75.9%)' : 'No' }}</td>
                <td>{{ $escala->cognoscitiva_1_15 ? 'Reconoce objetos cotidianos (70.3%)' : 'No' }}</td>
                <td>{{ $escala->lenguaje_1_15 ? 'Dice algunas palabras' : 'No' }}</td>
                <td>{{ $escala->socio_afectiva_1_15 ? 'Imita acciones simples (78.4%)' : 'No' }}</td>
                <td>{{ $escala->habitos_salud_1_15 ? 'Se alimenta con las manos (68.7%)' : 'No' }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Botón de regreso -->
    <div class="form-group">
        <a href="{{ route('escala_desarrollo.index') }}" class="btn btn-secondary">Volver</a>
        <button onclick="window.location.href='{{ route('generate.pdf', ['paciente_id' => $escala->paciente_id]) }}'">Generar PDF</button>
    </div>
</div>
@endsection
