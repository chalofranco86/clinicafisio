<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Paciente extends Model
{
    protected $table = 'pacientes';
    // Agrega aquí los campos que se permiten para la asignación masiva
    protected $fillable = [
        'pacientetipos_id',
        'nombre',
        'escolaridad',
        'fecha_nacimiento',
        'genero',
        'telefono',
        'domicilio',
        'entidad',
        'ocupacion',
        'edad',
        'lugar_nacimiento',
        'estado_civil',
        'peso',
        'talla',
        'estatura',
        'imc',
        'etnia',
        'embarazo',
        'hijos',
        'meses_embarazo'                
    ];

    public function historiales()
    {
        return $this->hasMany(HistorialClinico::class);
    }
    public function Pacientetipo()
    {
        return $this->belongsTo(Pacientetipo::class);
    }
}

