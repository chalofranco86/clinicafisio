<!DOCTYPE html>
<html>
<head>
    <title>Escala de Desarrollo</title>
    <style>
        /* Agrega estilos necesarios para el PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Escala de Desarrollo</h1>
    @foreach ($escalas as $escala)
        <h2>Paciente: {{ $escala['paciente']['nombre'] }}</h2>
        <table>
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
                    <td>1-15 meses</td>
                    <td>{{ $escala['motora_gruesa_1_15'] ? 'Camina solo (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['motora_fina_1_15'] ? 'Sujeta objetos pequeños con los dedos (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['cognoscitiva_1_15'] ? 'Reconoce objetos cotidianos (70.3%)' : 'No' }}</td>
                    <td>{{ $escala['lenguaje_1_15'] ? 'Dice algunas palabras' : 'No' }}</td>
                    <td>{{ $escala['socio_afectiva_1_15'] ? 'Imita acciones simples (78.4%)' : 'No' }}</td>
                    <td>{{ $escala['habitos_salud_1_15'] ? 'Se alimenta con las manos (68.7%)' : 'No' }}</td>
                </tr>
                <tr>
                    <td>15-2 años</td>
                    <td>{{ $escala['motora_gruesa_15_2'] ? 'Corre (80.5%)' : 'No' }}</td>
                    <td>{{ $escala['motora_fina_15_2'] ? 'Construye torres (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['cognoscitiva_15_2'] ? 'Identifica colores (70.3%)' : 'No' }}</td>
                    <td>{{ $escala['lenguaje_15_2'] ? 'Frases cortas' : 'No' }}</td>
                    <td>{{ $escala['socio_afectiva_15_2'] ? 'Juega con otros niños (78.4%)' : 'No' }}</td>
                    <td>{{ $escala['habitos_salud_15_2'] ? 'Usa utensilios (68.7%)' : 'No' }}</td>
                </tr>
                <tr>
                    <td>2-2.5 años</td>
                    <td>{{ $escala['motora_gruesa_2_25'] ? 'Salta (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['motora_fina_2_25'] ? 'Dibuja círculos (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['cognoscitiva_2_25'] ? 'Cuenta hasta 10 (70.3%)' : 'No' }}</td>
                    <td>{{ $escala['lenguaje_2_25'] ? 'Oraciones simples' : 'No' }}</td>
                    <td>{{ $escala['socio_afectiva_2_25'] ? 'Comparte juguetes (78.4%)' : 'No' }}</td>
                    <td>{{ $escala['habitos_salud_2_25'] ? 'Se viste solo (68.7%)' : 'No' }}</td>
                </tr>
                <tr>
                    <td>2.5-3 años</td>
                    <td>{{ $escala['motora_gruesa_2_3'] ? 'Sube escaleras (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['motora_fina_2_3'] ? 'Enhebra cuentas (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['cognoscitiva_2_3'] ? 'Reconoce formas (70.3%)' : 'No' }}</td>
                    <td>{{ $escala['lenguaje_2_3'] ? 'Habla en oraciones' : 'No' }}</td>
                    <td>{{ $escala['socio_afectiva_2_3'] ? 'Juega en grupo (78.4%)' : 'No' }}</td>
                    <td>{{ $escala['habitos_salud_2_3'] ? 'Usa el baño solo (68.7%)' : 'No' }}</td>
                </tr>
                <tr>
                    <td>3-4 años</td>
                    <td>{{ $escala['motora_gruesa_3_4'] ? 'Salta en un pie (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['motora_fina_3_4'] ? 'Dibuja figuras (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['cognoscitiva_3_4'] ? 'Resuelve rompecabezas (70.3%)' : 'No' }}</td>
                    <td>{{ $escala['lenguaje_3_4'] ? 'Cuenta historias' : 'No' }}</td>
                    <td>{{ $escala['socio_afectiva_3_4'] ? 'Juega a roles (78.4%)' : 'No' }}</td>
                    <td>{{ $escala['habitos_salud_3_4'] ? 'Se lava las manos (68.7%)' : 'No' }}</td>
                </tr>
                <tr>
                    <td>4-5 años</td>
                    <td>{{ $escala['motora_gruesa_4_5'] ? 'Corre rápido (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['motora_fina_4_5'] ? 'Escribe su nombre (75.9%)' : 'No' }}</td>
                    <td>{{ $escala['cognoscitiva_4_5'] ? 'Reconoce letras (70.3%)' : 'No' }}</td>
                    <td>{{ $escala['lenguaje_4_5'] ? 'Habla claramente' : 'No' }}</td>
                    <td>{{ $escala['socio_afectiva_4_5'] ? 'Hace amigos (78.4%)' : 'No' }}</td>
                    <td>{{ $escala['habitos_salud_4_5'] ? 'Se viste solo (68.7%)' : 'No' }}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
</body>
</html>