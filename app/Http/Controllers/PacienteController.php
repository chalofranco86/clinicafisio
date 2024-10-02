<?php

namespace App\Http\Controllers;

use App\Models\Paciente; 
use Illuminate\Http\Request;
use App\Models\TipoPaciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener los tipos de pacientes desde la base de datos
        $pacientetipos = \App\Models\TipoPaciente::all();  // Asegúrate de tener el modelo `TipoPaciente`
        
        // Pasar los tipos de pacientes a la vista
        return view('pacientes.create', compact('pacientetipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'pacientetipos_id' => 'required|exists:tipo_pacientes,id',
            'nombre' => 'required|string',
            'escolaridad' => 'required|string',
            'fecha_nacimiento' => 'required|string',
            'genero' => 'required|string',
            'telefono' => 'required|string',
            'domicilio' => 'required|string',
            'entidad' => 'required|string',  // Cambiar a 255
            'ocupacion' => 'required|string',  // Cambiar a 255
            'edad' => 'required|string',  // Quizás mejor utilizar un entero
            'lugar_nacimiento' => 'required|string',  // Cambiar a 255
            'estado_civil' => 'required|string',  // Cambiar a 255
            'peso' => 'required|string',
            'talla' => 'required|string',
            'estatura' => 'required|string',
            'imc' => 'nullable|string',
            'etnia' => 'nullable|string',
        ]);
    
        Paciente::create($request->all());
    
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtén el paciente que deseas editar
        $paciente = Paciente::findOrFail($id);
    
        // Obtén los tipos de pacientes para el select
        $pacientetipos = TipoPaciente::all(); // Asegúrate de que la tabla y el modelo son correctos
    
        // Retorna la vista de edición con el paciente y los tipos de pacientes
        return view('pacientes.edit', compact('paciente', 'pacientetipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'pacientetipos_id' => 'required|exists:tipo_pacientes,id',
            'nombre' => 'required|string|max:255',
            'escolaridad' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:1',
            'telefono' => 'required|string|max:15',
            'domicilio' => 'required|string|max:255',
            'entidad' => 'required|string|max:255',
            'ocupacion' => 'required|string|max:255',
            'edad' => 'required|integer',
            'lugar_nacimiento' => 'required|string|max:255',
            'estado_civil' => 'required|string|max:255',
            'peso' => 'required|string|max:255',
            'talla' => 'required|string|max:255',
            'estatura' => 'required|string|max:255',
            'imc' => 'nullable|string|max:255',
            'etnia' => 'nullable|string|max:255',
            'embarazo' => 'nullable|string|max:255', // puede ser opcional dependiendo del género
            'hijos' => 'nullable|string|max:255',
            'meses_embarazo' => 'nullable|string|max:255',
        ]);
    
        // Encontrar el paciente por ID
        $paciente = Paciente::findOrFail($id);
    
        // Actualizar el paciente con los datos validados
        $paciente->update($validatedData);
    
        // Redireccionar con mensaje de éxito
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
    
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}
