<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use App\Models\Paciente;
use App\Models\Medico; // Importa el modelo Medico
use Illuminate\Http\Request;

class AntecedenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtenemos todos los antecedentes
        $antecedentes = Antecedente::with(['paciente', 'medico'])->get();

        // Retornamos la vista con los antecedentes
        return view('antecedentes.index', compact('antecedentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtenemos la lista de pacientes y médicos para el formulario
        $pacientes = Paciente::all();
        $medicos = Medico::all(); // Obtener lista de médicos

        // Retornamos la vista para crear un nuevo antecedente
        return view('antecedentes.create', compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha_antecedente' => 'required|date',
            'motivo_consulta' => 'required|string',
            'tratamientos_previos' => 'nullable|string',
            'diabetes' => 'nullable|string',
            'alergias' => 'nullable|string',
            'cancer' => 'nullable|string',
            'transfusiones' => 'nullable|string',
            'hta' => 'nullable|string',
            'encames' => 'nullable|string',
            'accidentes' => 'nullable|string',
            'cardiopatias' => 'nullable|string',
            'cirugias' => 'nullable|string',
            'contracturas' => 'nullable|string',
            'fracturas' => 'nullable|string',
            'observaciones_antecedentes' => 'nullable|string',
            't/a' => 'nullable|string',
            'temperatura' => 'nullable|string',
            'fc' => 'nullable|string',
            'fr' => 'nullable|string',
            'tabaquismo' => 'nullable|string',
            'drogas' => 'nullable|string',
            'automedica' => 'nullable|string',
            'alcoholismo' => 'nullable|string',
            'actividad_fisica' => 'nullable|string',
            'pasatiempos' => 'nullable|string',
            'reflejos' => 'nullable|string',
            'sensibilidad' => 'nullable|string',
            'lenguaje_orientacion' => 'nullable|string',
            'otros' => 'nullable|string',
            'val_inicial' => 'nullable|string',
            'val_final' => 'nullable|string',
            'independientei' => 'nullable|string',
            'independientef' => 'nullable|string',
            'silla_ruedasi' => 'nullable|string',
            'silla_ruedasf' => 'nullable|string',
            'ayudai' => 'nullable|string',
            'ayudaf' => 'nullable|string',
            'camillasi' => 'nullable|string',
            'camillasf' => 'nullable|string',
        ]);

        // Crear un nuevo antecedente
        Antecedente::create($request->all());

        // Redirigir a la lista de antecedentes con un mensaje de éxito
        return redirect()->route('antecedentes.index')->with('success', 'Antecedente creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Antecedente $antecedente)
    {
        // Retornamos la vista de detalles del antecedente
        return view('antecedentes.show', compact('antecedente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Antecedente $antecedente)
    {
        // Obtenemos la lista de pacientes y médicos
        $pacientes = Paciente::all();
        $medicos = Medico::all(); // Obtener lista de médicos

        // Retornamos la vista de edición del antecedente
        return view('antecedentes.edit', compact('antecedente', 'pacientes', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Antecedente $antecedente)
    {
        // Validación de los datos
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id', // Validación del id_medico
            'fecha_antecedente' => 'required|date',
            'motivo_consulta' => 'required|string',
            'tratamientos_previos' => 'nullable|string',
            'diabetes' => 'nullable|string',
            'alergias' => 'nullable|string',
            'cancer' => 'nullable|string',
            'transfusiones' => 'nullable|string',
            'hta' => 'nullable|string',
            'encames' => 'nullable|string',
            'accidentes' => 'nullable|string',
            'cardiopatias' => 'nullable|string',
            'cirugias' => 'nullable|string',
            'contracturas' => 'nullable|string',
            'fracturas' => 'nullable|string',
            'observaciones_antecedentes' => 'nullable|string',
            't/a' => 'nullable|string',
            'temperatura' => 'nullable|string',
            'fc' => 'nullable|string',
            'fr' => 'nullable|string',
            'tabaquismo' => 'nullable|string',
            'drogas' => 'nullable|string',
            'automedica' => 'nullable|string',
            'alcoholismo' => 'nullable|string',
            'actividad_fisica' => 'nullable|string',
            'pasatiempos' => 'nullable|string',
            'reflejos' => 'nullable|string',
            'sensibilidad' => 'nullable|string',
            'lenguaje_orientacion' => 'nullable|string',
            'otros' => 'nullable|string',
            'val_inicial' => 'nullable|string',
            'val_final' => 'nullable|string',
            'independientei' => 'nullable|string',
            'independientef' => 'nullable|string',
            'silla_ruedasi' => 'nullable|string',
            'silla_ruedasf' => 'nullable|string',
            'ayudai' => 'nullable|string',
            'ayudaf' => 'nullable|string',
            'camillasi' => 'nullable|string',
            'camillasf' => 'nullable|string',
            'libre' => 'nullable|string',
            'claudicante' => 'nullable|string',
            'con_ayuda' => 'nullable|string',
            'espasticas' => 'nullable|string',
            'ataxica' => 'nullable|string',
            'otros2' => 'nullable|string',
            'sitio' => 'nullable|string',
            'quelaide' => 'nullable|string',
            'retractil' => 'nullable|string',
            'abierta' => 'nullable|string',
            'con_adherencia' => 'nullable|string',
            'hipertrofica' => 'nullable|string',

        ]);

        // Actualizamos los datos del antecedente
        $antecedente->update($request->all());

        // Redirigir a la lista de antecedentes con un mensaje de éxito
        return redirect()->route('antecedentes.index')->with('success', 'Antecedente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Antecedente $antecedente)
    {
        // Eliminamos el antecedente
        $antecedente->delete();

        // Redirigir a la lista de antecedentes con un mensaje de éxito
        return redirect()->route('antecedentes.index')->with('success', 'Antecedente eliminado con éxito.');
    }
}
