<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use HasFactory;

    // Definimos la tabla asociada al modelo
    protected $table = 'antecedentes';

    // Los campos que son asignables en masa
    protected $fillable = [
        'paciente_id',
        'medico_id',
        'fecha_antecedente',
        'motivo_consulta',
        'tratamientos_previos',
        'diabetes',
        'alergias',
        'cancer',
        'transfusiones',
        'hta',
        'encames',
        'accidentes',
        'cardiopatias',
        'cirugias',
        'contracturas',
        'fracturas',
        'observaciones_antecedentes',
        't/a',
        'temperatura',
        'fc',
        'fr',
        'tabaquismo',
        'drogas',
        'automedica',
        'alcoholismo',
        'actividad_fisica',
        'pasatiempos',
        'reflejos',
        'sensibilidad',
        'lenguaje_orientacion',
        'otros',
        'val_inicial',
        'val_final',
        'independientei',
        'independientef',
        'silla_ruedasi',
        'silla_ruedasf',
        'ayudai',
        'ayudaf',
        'camillasi',
        'camillasf',
        'ayudai',
        'ayudaf',
        'camillasi',
        'camillasf',
        'libre',
        'claudicante',
        'con_ayuda',
        'espasticas',
        'ataxica',
        'otros2',
        'sitio',
        'quelaide',
        'retractil',
        'abierta',
        'con_adherencia',
        'hipertrofica',
    ];

    // Relación con el modelo Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
