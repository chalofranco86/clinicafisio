<?php

namespace App\Http\Controllers;

use App\Models\HistorialClinico;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

class HistorialClinicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los historiales clínicos y pasarlos a la vista
        $historiales = HistorialClinico::with('paciente', 'medico')->get();
        return view('historial_clinico.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los pacientes y médicos para mostrar en el formulario
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('historial_clinico.create', compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados en el formulario
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha' => 'required|date',
            'diagnostico' => 'required|string',
            'tratamiento' => 'required|string',
        ]);
    
        // Crear un nuevo historial clínico
        HistorialClinico::create($validatedData);
    
        // Redireccionar a la lista de historiales clínicos con un mensaje de éxito
        return redirect()->route('historial_clinico.index')->with('success', 'Historial clínico creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el historial clínico por su ID y cargar las relaciones con paciente y médico
        $historial = HistorialClinico::with('paciente', 'medico')->findOrFail($id);
        return view('historial_clinico.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el historial clínico por su ID
        $historial = HistorialClinico::findOrFail($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('historial_clinico.edit', compact('historial', 'pacientes', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos enviados en el formulario
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha' => 'required|date',
            'diagnostico' => 'required|string',
            'tratamiento' => 'required|string',
        ]);
    
        // Encontrar y actualizar el historial clínico
        $historial = HistorialClinico::findOrFail($id);
        $historial->update($validatedData);
    
        // Redireccionar a la lista de historiales clínicos con un mensaje de éxito
        return redirect()->route('historial_clinico.index')->with('success', 'Historial clínico actualizado exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar el historial clínico por su ID
        $historial = HistorialClinico::findOrFail($id);
        $historial->delete();

        // Redireccionar a la lista de historiales clínicos con un mensaje de éxito
        return redirect()->route('historial_clinico.index')->with('success', 'Historial clínico eliminado exitosamente.');
    }
}
