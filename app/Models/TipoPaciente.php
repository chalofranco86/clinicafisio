<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPaciente extends Model
{
    protected $table = 'tipo_pacientes';

    protected $fillable = ['nombre'];
}