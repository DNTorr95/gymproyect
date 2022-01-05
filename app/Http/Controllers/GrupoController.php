<?php

namespace App\Http\Controllers;

use App\Models\grupo;
use App\Models\instructor;
use App\Models\disciplina;
use App\Http\Requests\StoregrupoRequest;
use App\Http\Requests\UpdategrupoRequest;

class GrupoController extends Controller
{

    public function index()
    {
        $grupos = Grupo::all();
        return view('gestionar_grupo.index', compact('grupos'));
    }

    public function create()
    {
        $instructores = Instructor::all();
        $instructores->load('persona');
        $disciplinas = Disciplina::all();
        return view('gestionar_grupo.create', compact('instructores', 'disciplinas'));
    }

    public function store(StoregrupoRequest $request)
    {
        $grupo = new Grupo($request->all());
        $grupo->disciplina_id = $request->disciplina_id;
        $grupo->instructor_id = $request->instructor_id;
        $grupo->save();

        return redirect()->route('grupos.index');
    }

    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id);
        $instructores = Instructor::all();
        $instructores->load('persona');
        $disciplinas = Disciplina::all();
        return view('gestionar_grupo.edit', compact('instructores', 'disciplinas', 'grupo'));
    }

    public function update(UpdategrupoRequest $request, $id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->update($request->all());
        $grupo->instructor_id = $request->instructor_id;
        $grupo->disciplina_id = $request->disciplina_id;
        $grupo->save();
        return redirect()->route('grupos.index');
    }

    public function destroy($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->delete();
        return redirect()->route('grupos.index');
    }
}
