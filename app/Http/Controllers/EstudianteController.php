<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Grupo;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id', 'desc')->paginate(5);

        return view('estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::all();
        return view('estudiantes.create', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'apellidos' => 'required|string|max:30',
            'email' => 'required|email|unique:estudiantes,email',
            'telefono' => 'required|string|max:15|unique:estudiantes,telefono',
            'edad' => 'required|integer|min:1',
            'grupo_id' => 'required|integer|exists:grupos,id',
        ]);

        $estudiante = new Estudiante();
        $estudiante->nombre = $request->nombre;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->email = $request->email;
        $estudiante->telefono = $request->telefono;
        $estudiante->edad = $request->edad;
        $estudiante->grupo_id = $request->grupo_id;

        $estudiante->save();
        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::with('grupo')->findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return redirect()->route('estudiantes.index')->with('error', 'Estudiante no encontrado');
        }
        $grupos = Grupo::all();
        return view('estudiantes.edit', compact('estudiante', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'grupo_id' => 'required|integer|exists:grupos,id',
            'nombre' => 'required|string|max:30',
            'apellidos' => 'required|string|max:30',
            'email' => 'required|email|unique:estudiantes,email,'.$id,
            'telefono' => 'required|string|max:15|unique:estudiantes,telefono,'.$id,
            'edad' => 'required|integer|min:1',
        ]);

        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return redirect()->route('estudiantes.index')->with('error', 'Estudiante no encontrado');
        }

        $estudiante->nombre = $request->nombre;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->email = $request->email;
        $estudiante->telefono = $request->telefono;
        $estudiante->edad = $request->edad;
        $estudiante->grupo_id = $request->grupo_id;

        $estudiante->save();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return redirect()->route('estudiantes.index')->with('error', 'Estudiante no encontrado');
        }

        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente');
    }
}
