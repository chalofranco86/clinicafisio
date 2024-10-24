<?php

namespace App\Http\Controllers;

use App\Models\EscalaDesarrollo;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class EscalaDesarrolloController extends Controller
{
    /**
     * Muestra una lista de las escalas de desarrollo.
     */
    public function index()
    {
        $escalas = EscalaDesarrollo::with('paciente')->get();
        return view('escala_desarrollo.index', compact('escalas'));
    }

    /**
     * Muestra el formulario para crear una nueva escala de desarrollo.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all(); // Obtener lista de médicos
        return view('escala_desarrollo.create', compact('pacientes', 'medicos'));
    }

    /**
     * Almacena una nueva escala de desarrollo en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            
            // Validaciones para todos los campos booleanos sin 'required'
            'motora_gruesa_1_15' => 'nullable|boolean',
            'motora_fina_1_15' => 'nullable|boolean',
            'cognoscitiva_1_15' => 'nullable|boolean',
            'lenguaje_1_15' => 'nullable|boolean',
            'socio_afectiva_1_15' => 'nullable|boolean',
            'habitos_salud_1_15' => 'nullable|boolean',
            
            'motora_gruesa_15_2' => 'nullable|boolean',
            'motora_fina_15_2' => 'nullable|boolean',
            'cognoscitiva_15_2' => 'nullable|boolean',
            'lenguaje_15_2' => 'nullable|boolean',
            'socio_afectiva_15_2' => 'nullable|boolean',
            'habitos_salud_15_2' => 'nullable|boolean',
            
            'motora_gruesa_2_25' => 'nullable|boolean',
            'motora_fina_2_25' => 'nullable|boolean',
            'cognoscitiva_2_25' => 'nullable|boolean',
            'lenguaje_2_25' => 'nullable|boolean',
            'socio_afectiva_2_25' => 'nullable|boolean',
            'habitos_salud_2_25' => 'nullable|boolean',
            
            'motora_gruesa_2_3' => 'nullable|boolean',
            'motora_fina_2_3' => 'nullable|boolean',
            'cognoscitiva_2_3' => 'nullable|boolean',
            'lenguaje_2_3' => 'nullable|boolean',
            'socio_afectiva_2_3' => 'nullable|boolean',
            'habitos_salud_2_3' => 'nullable|boolean',
            
            'motora_gruesa_3_4' => 'nullable|boolean',
            'motora_fina_3_4' => 'nullable|boolean',
            'cognoscitiva_3_4' => 'nullable|boolean',
            'lenguaje_3_4' => 'nullable|boolean',
            'socio_afectiva_3_4' => 'nullable|boolean',
            'habitos_salud_3_4' => 'nullable|boolean',
            
            'motora_gruesa_4_5' => 'nullable|boolean',
            'motora_fina_4_5' => 'nullable|boolean',
            'cognoscitiva_4_5' => 'nullable|boolean',
            'lenguaje_4_5' => 'nullable|boolean',
            'socio_afectiva_4_5' => 'nullable|boolean',
            'habitos_salud_4_5' => 'nullable|boolean',
        ]);
        

        EscalaDesarrollo::create($validatedData);

        return redirect()->route('escala_desarrollo.index')->with('success', 'Escala de desarrollo creada exitosamente.');
    }
    public function generatePDF($paciente_id)
    {
        // Obtener los datos necesarios para la vista del paciente específico
        $escalas = EscalaDesarrollo::with('paciente')
            ->where('paciente_id', $paciente_id)
            ->get()
            ->map(function ($escala) {
                return [
                    'paciente' => ['nombre' => $escala->paciente->nombre],
                    'motora_gruesa_1_15' => $escala->motora_gruesa_1_15,
                    'motora_fina_1_15' => $escala->motora_fina_1_15,
                    'cognoscitiva_1_15' => $escala->cognoscitiva_1_15,
                    'lenguaje_1_15' => $escala->lenguaje_1_15,
                    'socio_afectiva_1_15' => $escala->socio_afectiva_1_15,
                    'habitos_salud_1_15' => $escala->habitos_salud_1_15,
                    'motora_gruesa_15_2' => $escala->motora_gruesa_15_2,
                    'motora_fina_15_2' => $escala->motora_fina_15_2,
                    'cognoscitiva_15_2' => $escala->cognoscitiva_15_2,
                    'lenguaje_15_2' => $escala->lenguaje_15_2,
                    'socio_afectiva_15_2' => $escala->socio_afectiva_15_2,
                    'habitos_salud_15_2' => $escala->habitos_salud_15_2,
                    'motora_gruesa_2_25' => $escala->motora_gruesa_2_25,
                    'motora_fina_2_25' => $escala->motora_fina_2_25,
                    'cognoscitiva_2_25' => $escala->cognoscitiva_2_25,
                    'lenguaje_2_25' => $escala->lenguaje_2_25,
                    'socio_afectiva_2_25' => $escala->socio_afectiva_2_25,
                    'habitos_salud_2_25' => $escala->habitos_salud_2_25,
                    'motora_gruesa_2_3' => $escala->motora_gruesa_2_3,
                    'motora_fina_2_3' => $escala->motora_fina_2_3,
                    'cognoscitiva_2_3' => $escala->cognoscitiva_2_3,
                    'lenguaje_2_3' => $escala->lenguaje_2_3,
                    'socio_afectiva_2_3' => $escala->socio_afectiva_2_3,
                    'habitos_salud_2_3' => $escala->habitos_salud_2_3,
                    'motora_gruesa_3_4' => $escala->motora_gruesa_3_4,
                    'motora_fina_3_4' => $escala->motora_fina_3_4,
                    'cognoscitiva_3_4' => $escala->cognoscitiva_3_4,
                    'lenguaje_3_4' => $escala->lenguaje_3_4,
                    'socio_afectiva_3_4' => $escala->socio_afectiva_3_4,
                    'habitos_salud_3_4' => $escala->habitos_salud_3_4,
                    'motora_gruesa_4_5' => $escala->motora_gruesa_4_5,
                    'motora_fina_4_5' => $escala->motora_fina_4_5,
                    'cognoscitiva_4_5' => $escala->cognoscitiva_4_5,
                    'lenguaje_4_5' => $escala->lenguaje_4_5,
                    'socio_afectiva_4_5' => $escala->socio_afectiva_4_5,
                    'habitos_salud_4_5' => $escala->habitos_salud_4_5,
                ];
            });
    
        $pdf = PDF::loadView('escala_desarrollo.pdf', compact('escalas'));
        return $pdf->download('reporte.pdf');
    }

        /**
     * Muestra los detalles de una escala de desarrollo específica.
     */
    public function show($id)
    {
        $escala = EscalaDesarrollo::with(['paciente', 'medico'])->findOrFail($id);
        return view('escala_desarrollo.show', compact('escala'));
    }

    /**
     * Muestra el formulario para editar una escala de desarrollo existente.
     */
    public function edit($id)
    {
        $escala = EscalaDesarrollo::findOrFail($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all(); // Obtener lista de médicos
        return view('escala_desarrollo.edit', compact('escala', 'pacientes', 'medicos'));
    }

    /**
     * Actualiza la escala de desarrollo especificada en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            
            // Validaciones para todos los campos booleanos
            'motora_gruesa_1_15' => 'nullable|boolean',
            'motora_fina_1_15' => 'nullable|boolean',
            'cognoscitiva_1_15' => 'nullable|boolean',
            'lenguaje_1_15' => 'nullable|boolean',
            'socio_afectiva_1_15' => 'nullable|boolean',
            'habitos_salud_1_15' => 'nullable|boolean',
            
            'motora_gruesa_15_2' => 'nullable|boolean',
            'motora_fina_15_2' => 'nullable|boolean',
            'cognoscitiva_15_2' => 'nullable|boolean',
            'lenguaje_15_2' => 'nullable|boolean',
            'socio_afectiva_15_2' => 'nullable|boolean',
            'habitos_salud_15_2' => 'nullable|boolean',
            
            'motora_gruesa_2_25' => 'nullable|boolean',
            'motora_fina_2_25' => 'nullable|boolean',
            'cognoscitiva_2_25' => 'nullable|boolean',
            'lenguaje_2_25' => 'nullable|boolean',
            'socio_afectiva_2_25' => 'nullable|boolean',
            'habitos_salud_2_25' => 'nullable|boolean',
            
            'motora_gruesa_2_3' => 'nullable|boolean',
            'motora_fina_2_3' => 'nullable|boolean',
            'cognoscitiva_2_3' => 'nullable|boolean',
            'lenguaje_2_3' => 'nullable|boolean',
            'socio_afectiva_2_3' => 'nullable|boolean',
            'habitos_salud_2_3' => 'nullable|boolean',
            
            'motora_gruesa_3_4' => 'nullable|boolean',
            'motora_fina_3_4' => 'nullable|boolean',
            'cognoscitiva_3_4' => 'nullable|boolean',
            'lenguaje_3_4' => 'nullable|boolean',
            'socio_afectiva_3_4' => 'nullable|boolean',
            'habitos_salud_3_4' => 'nullable|boolean',
            
            'motora_gruesa_4_5' => 'nullable|boolean',
            'motora_fina_4_5' => 'nullable|boolean',
            'cognoscitiva_4_5' => 'nullable|boolean',
            'lenguaje_4_5' => 'nullable|boolean',
            'socio_afectiva_4_5' => 'nullable|boolean',
            'habitos_salud_4_5' => 'nullable|boolean',
        ]);
    
        $escala = EscalaDesarrollo::findOrFail($id);
        $escala->update($validatedData);
    
        return redirect()->route('escala_desarrollo.index')->with('success', 'Escala de desarrollo actualizada exitosamente.');
    }

    /**
     * Elimina la escala de desarrollo especificada de la base de datos.
     */
    public function destroy($id)
    {
        $escala = EscalaDesarrollo::findOrFail($id);
        $escala->delete();

        return redirect()->route('escala_desarrollo.index')->with('success', 'Escala de desarrollo eliminada exitosamente.');
    }
}
