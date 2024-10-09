<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\HistorialClinicoController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\EntrevistapedController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\EscalaDesarrolloController;

// Rutas de tipo resource
Route::resource('pacientes', PacienteController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('historial_clinico', HistorialClinicoController::class);
Route::resource('antecedentes', AntecedenteController::class);
Route::resource('entrevistapeds', EntrevistapedController::class); // Agregar esta línea para las entrevistas pediátricas
Route::resource('evaluaciones', EvaluacionController::class);
Route::resource('escala_desarrollo', EscalaDesarrolloController::class);

Route::get('/generate-pdf/{paciente_id}', [EscalaDesarrolloController::class, 'generatePDF'])->name('generate.pdf');


// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
});
