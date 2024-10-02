<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Paciente;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    // Mostrar el formulario de creación
    public function create()
    {
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        return view('evaluaciones.create', compact('pacientes'));
    }

    // Almacenar la evaluación en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'msd_lanza' => 'nullable|string',
            'msd_alcanza' => 'nullable|string',
            'msd_coge' => 'nullable|string',
            'msd_suelta' => 'nullable|string',
            'msd_empuja' => 'nullable|string',
            'msd_hala' => 'nullable|string',
            'msi_lanza' => 'nullable|string',
            'msi_alcanza' => 'nullable|string',
            'msi_coge' => 'nullable|string',
            'msi_suelta' => 'nullable|string',
            'msi_empuja' => 'nullable|string',
            'msi_hala' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        Evaluacion::create($request->all());

        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación creada exitosamente.');
    } 
    
    public function index()
    {
        $evaluaciones = Evaluacion::with('paciente')->get(); // Carga las evaluaciones con el paciente relacionado
        return view('evaluaciones.index', compact('evaluaciones'));
    }

    public function show($id)
    {
        $evaluacion = Evaluacion::with('paciente')->findOrFail($id); // Obtener la evaluación junto con el paciente
        return view('evaluaciones.show', compact('evaluacion'));
    }
}
