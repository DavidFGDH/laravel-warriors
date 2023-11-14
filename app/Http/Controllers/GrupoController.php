<?php

namespace App\Http\Controllers;

use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::orderBy('id', 'desc')->paginate(5);

        return view('grupos.index',compact('grupos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupos.create');
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
            'semestre' => 'required|numeric',
            'grupo' => 'required|string',
            'turno' => 'required|in:Matutino,Vespertino,Nocturno',
        ]);

        $grupo = new Grupo;
        $grupo->semestre = $request->semestre;
        $grupo->grupo = Str::Upper($request->grupo);
        $grupo->turno = $request->turno;
        $grupo->save();

        return redirect()->route('grupos.index')->with('success', 'Grupo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo = Grupo::findOrFail($id);

        return view('grupos.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id);
        return view('grupos.edit', compact('grupo'));
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
            'semestre' => 'required|numeric',
            'grupo' => 'required|string',
            'turno' => 'required|in:Matutino,Vespertino,Nocturno',
        ]);

        $grupo = Grupo::findOrFail($id);

        $grupo->update([
            'semestre' => $request->semestre,
            'grupo' => Str::Upper($request->grupo),
            'turno' => $request->turno,
        ]);

        return redirect()->route('grupos.show', $grupo->id)
            ->with('success', 'Grupo updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            $estudiantes = $grupo->estudiantes;

            foreach ($estudiantes as $estudiante) {
                $estudiante->grupo_id = null;
                $estudiante->save();
            }

            $grupo->delete();
            return redirect()->route('grupos.index')->with('success', 'Grupo eliminado con éxito');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('grupos.index')->with('error', 'No se pudo encontrar el grupo');
        } catch (\Exception $e) {
            return redirect()->route('grupos.index')->with('error', 'Error al eliminar el grupo');
        }
    }
}
