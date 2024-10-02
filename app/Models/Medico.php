<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'numero_licencia', 
        'telefono',
        'email',
        'direccion',     
    ];

    public function historiales()
    {
        return $this->hasMany(HistorialClinico::class);
    }
}
