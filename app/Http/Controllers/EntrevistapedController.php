<?php

namespace App\Http\Controllers;

use App\Models\Entrevistaped;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class EntrevistapedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar las entrevistas junto con el paciente relacionado
        $entrevistapeds = Entrevistaped::with('paciente')->paginate(10); // Asegúrate de tener la relación 'paciente'
        
        // Pasar la variable correcta a la vista
        return view('entrevistaped.index', compact('entrevistapeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Traemos los pacientes para seleccionar en el formulario
        $pacientes = Paciente::all();
        return view('entrevistaped.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Guardar la nueva entrevista
    public function store(Request $request)
    {
        // Validar los campos
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'motivo_consulta' => 'required|string|max:255',
            'aparicion' => 'required|string|max:255',
        ]);

        // Crear y guardar la entrevista
        Entrevistaped::create($validatedData);

        // Redirigir o mostrar mensaje de éxito
        return redirect()->route('entrevistapeds.index')->with('success', 'Entrevista creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $entrevista = Entrevistaped::findOrFail($id);
        return view('entrevistaped.show', compact('entrevista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $entrevista = Entrevistaped::findOrFail($id);
        $pacientes = Paciente::all(); // Traemos los pacientes para el select
        return view('entrevistaped.edit', compact('entrevista', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los campos
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'motivo_consulta' => 'required|string|max:255',
            'aparicion' => 'required|string|max:255',
        ]);

        // Encontrar la entrevista y actualizar
        $entrevista = Entrevistaped::findOrFail($id);
        $entrevista->update($validatedData);

        // Redirigir o mostrar mensaje de éxito
        return redirect()->route('entrevistapeds.index')->with('success', 'Entrevista actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entrevista = Entrevistaped::findOrFail($id);
        $entrevista->delete();

        // Redirigir o mostrar mensaje de éxito
        return redirect()->route('entrevistapeds.index')->with('success', 'Entrevista eliminada exitosamente.');
    }
    public function generatePDF($id)
    {
        $entrevista = Entrevistaped::with('paciente')->findOrFail($id);
        $pdf = PDF::loadView('entrevistaped.pdf', compact('entrevista'));
        return $pdf->download('entrevista.pdf');
    }

}
