<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscalaDesarrollo extends Model
{
    use HasFactory;

    protected $table = 'escala_desarrollo'; // Nombre de la tabla

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'motora_gruesa_1_15',
        'motora_fina_1_15',
        'cognoscitiva_1_15',
        'lenguaje_1_15',
        'socio_afectiva_1_15',
        'habitos_salud_1_15',
        'motora_gruesa_15_2',
        'motora_fina_15_2',
        'cognoscitiva_15_2',
        'lenguaje_15_2',
        'socio_afectiva_15_2',
        'habitos_salud_15_2',
        'motora_gruesa_2_25',
        'motora_fina_2_25',
        'cognoscitiva_2_25',
        'lenguaje_2_25',
        'socio_afectiva_2_25',
        'habitos_salud_2_25',
        'motora_gruesa_2_3',
        'motora_fina_2_3',
        'cognoscitiva_2_3',
        'lenguaje_2_3',
        'socio_afectiva_2_3',
        'habitos_salud_2_3',
        'motora_gruesa_3_4',
        'motora_fina_3_4',
        'cognoscitiva_3_4',
        'lenguaje_3_4',
        'socio_afectiva_3_4',
        'habitos_salud_3_4',
        'motora_gruesa_4_5',
        'motora_fina_4_5',
        'cognoscitiva_4_5',
        'lenguaje_4_5',
        'socio_afectiva_4_5',
        'habitos_salud_4_5',
    ];

    /**
     * Relación con el modelo Paciente
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
