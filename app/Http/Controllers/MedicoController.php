<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los médicos de la base de datos
        $medicos = Medico::all();

        // Retornar la vista 'medicos.index' con la lista de médicos
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornar la vista 'medicos.create' para mostrar el formulario de creación
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:medicos',
            'direccion' => 'required|string|max:255',
        ]);

        // Crear un nuevo médico con los datos validados
        Medico::create($request->all());

        // Redirigir a la lista de médicos con un mensaje de éxito
        return redirect()->route('medicos.index')->with('success', 'Médico creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscar el médico por ID
        $medico = Medico::findOrFail($id);

        // Retornar la vista 'medicos.show' con los detalles del médico
        return view('medicos.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Buscar el médico por ID
        $medico = Medico::findOrFail($id);

        // Retornar la vista 'medicos.edit' con los datos del médico para editar
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:medicos,email,' . $id,
        ]);

        // Buscar el médico por ID y actualizarlo con los datos validados
        $medico = Medico::findOrFail($id);
        $medico->update($request->all());

        // Redirigir a la lista de médicos con un mensaje de éxito
        return redirect()->route('medicos.index')->with('success', 'Médico actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el médico por ID y eliminarlo
        $medico = Medico::findOrFail($id);
        $medico->delete();

        // Redirigir a la lista de médicos con un mensaje de éxito
        return redirect()->route('medicos.index')->with('success', 'Médico eliminado exitosamente.');
    }
}
