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

// Rutas para generar PDF
Route::get('/generate-pdf/{paciente_id}', [EscalaDesarrolloController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/evaluaciones/{id}/pdf', [EvaluacionController::class, 'generatePDF'])->name('evaluaciones.pdf');
Route::get('/entrevistapeds/{id}/pdf', [EntrevistapedController::class, 'generatePDF'])->name('entrevistapeds.pdf');
Route::get('/antecedentes/{id}/pdf', [AntecedenteController::class, 'generatePDF'])->name('antecedentes.pdf');

// Ruta para la página principal
Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('pacientes.index');
    })->name('dashboard');
});
