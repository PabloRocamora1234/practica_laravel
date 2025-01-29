<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    // Mostrar todos los alumnos
    public function index()
    {
        return response()->json(Alumno::all());
    }

    // Crear un nuevo alumno
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:32',
            'telefono' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'password' => 'required|string|max:64',
            'email' => 'required|string|max:64|unique:alumnos,email',
            'sexo' => 'nullable|string|max:10',
        ]);

        $alumno = Alumno::create($request->all());
        return response()->json($alumno, 201);
    }

    // Mostrar un alumno específico
    public function show($id)
    {
        return response()->json(Alumno::findOrFail($id));
    }

    // Actualizar un alumno
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'sometimes|required|string|max:32',
            'telefono' => 'sometimes|nullable|string|max:16',
            'edad' => 'sometimes|nullable|integer',
            'password' => 'sometimes|required|string|max:64',
            'email' => 'sometimes|required|string|max:64|unique:alumnos,email,' . $id,
            'sexo' => 'sometimes|nullable|string|max:10',
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());
        return response()->json($alumno);
    }

    // Eliminar un alumno
    public function destroy($id)
    {
        Alumno::findOrFail($id)->delete();
        return response()->json(['message' => 'Alumno eliminado correctamente']);
    }
}