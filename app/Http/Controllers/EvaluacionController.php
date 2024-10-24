<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

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
        // Generar el reporte PDF
    public function generatePDF($id)
    {
        $evaluacion = Evaluacion::with('paciente')->findOrFail($id);
        $pdf = PDF::loadView('evaluaciones.pdf', compact('evaluacion'));
        return $pdf->download('evaluacion.pdf');
    }
        // Eliminar la evaluación
    public function destroy($id)
    {
        $evaluacion = Evaluacion::findOrFail($id);
        $evaluacion->delete();
        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación eliminada exitosamente.');
    }
       // Mostrar el formulario de edición
       public function edit($id)
       {
           $evaluacion = Evaluacion::findOrFail($id);
           $pacientes = Paciente::all(); // Obtener todos los pacientes
           return view('evaluaciones.edit', compact('evaluacion', 'pacientes'));
       }
   
       // Actualizar la evaluación en la base de datos
       public function update(Request $request, $id)
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
   
           $evaluacion = Evaluacion::findOrFail($id);
           $evaluacion->update($request->all());
   
           return redirect()->route('evaluaciones.index')->with('success', 'Evaluación actualizada exitosamente.');
       }
}
