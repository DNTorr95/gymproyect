<?php

namespace App\Http\Controllers;

use App\Models\disciplina;
use App\Models\area;
use App\Models\paquete;
use App\Http\Requests\StoredisciplinaRequest;
use App\Http\Requests\UpdatedisciplinaRequest;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::all();
       return view('gestionar_disciplina.index', compact('disciplinas'));
    }

    public function create()
    {
        $areas = Area::all();
        $paquetes = Paquete::all();
        return view('gestionar_disciplina.create', compact('areas', 'paquetes'));
    }

    public function store(StoredisciplinaRequest $request)
    {
        //$request->validated();
        $disciplina = new Disciplina($request->validated()); 
        $disciplina->area_id = $request->area_id;
        $disciplina->paquete_id = $request->paquete_id;
        $disciplina->save();

        return redirect()->route('disciplinas.index');
    }

    public function edit($id)
    {
        $disciplina = disciplina::findOrFail($id);
        $areas = Area::all();
        $paquetes = Paquete::all();
        return view('gestionar_disciplina.edit', compact('disciplina', 'areas', 'paquetes'));
    }

    public function update(UpdatedisciplinaRequest $request, $id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->update($request->all());
        $disciplina->area_id = $request->area_id;
        $disciplina->paquete_id = $request->paquete_id;
        $disciplina->save();
        return redirect()->route('disciplinas.index');
    }

    public function destroy($id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->delete();
        return redirect()->route('disciplinas.index');
    }

}
