<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'msd_lanza',
        'msd_alcanza',
        'msd_coge',
        'msd_suelta',
        'msd_empuja',
        'msd_hala',
        'msi_lanza',
        'msi_alcanza',
        'msi_coge',
        'msi_suelta',
        'msi_empuja',
        'msi_hala',
        'observaciones',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
