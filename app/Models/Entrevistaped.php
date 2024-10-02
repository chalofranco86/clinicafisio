<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrevistaped extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'motivo_consulta',
        'aparicion',
    ];

    // Relación con el modelo Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}