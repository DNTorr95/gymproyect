<?php

namespace App\Http\Controllers;

use App\Models\inscripcion;
use App\Models\paquete;
use App\Models\grupo;
use App\Models\cliente; 
use App\Models\detalle_inscripcion;
use App\Http\Requests\StoreinscripcionRequest;
use App\Http\Requests\UpdateinscripcionRequest;
use App\Models\disciplina;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = inscripcion::all();
        return view('gestionar_inscripcion.index', compact('inscripciones'));
    }

    public function create()
    {   
        $paquetes = paquete::all();
        $grupos = grupo::all();
        $grupos->load('disciplina');
        return view('gestionar_inscripcion.create', compact('paquetes', 'grupos'));
    }

    public function store(StoreinscripcionRequest $request)
    {
        /*if ($request->filled(2)) {
            return dd($request->all());
        } else {
            return dd($request->only('fecha_ini'));
        }*/
        $cliente = cliente::where('id', $request->cliente_id)->first();
        if (is_null($cliente)) {
            return back()->withErrors(['Id del cliente no existe']);
        }
        $inscripcion = new inscripcion($request->all());
        $inscripcion->paquete_id = 1;
        $inscripcion->total = 0;
        $inscripcion->save();
        
        $grupos = grupo::all(); 
        for ($i=1; $i <= count($grupos); $i++) { 
            if ($request->filled($i)) {
                $detalle = new detalle_inscripcion();
                $disciplina = disciplina::where('id', $request->$i)->first();
                $detalle->grupo_id = $i;
                $detalle->disciplina_id = $disciplina->id;
                $detalle->inscripcion_id = $inscripcion->id;
                $detalle->precio = $disciplina->precio;
                $detalle->save();
                $inscripcion->total = $inscripcion->total + $detalle->precio;
                $inscripcion->save();
                $grupos[$i-1]->cupo = $grupos[$i-1]->cupo - 1;
                $grupos[$i-1]->save();
            }
        }
        /*$paquetes = Paquete::all();
        for ($i=1; $i <= count($paquetes); $i++) { 
            
        }*/
        return redirect()->route('inscripciones.index');
    }
    
    public function edit($id)
    {
        $paquetes = paquete::all();
        $grupos = grupo::all();
        $grupos->load('disciplina');
        $inscripcion = inscripcion::findOrFail($id);
        //$cliente = Cliente::findOrFail($inscripcion->cliente_id);
        return view('gestionar_inscripcion.edit', compact('inscripcion', 'grupos', 'paquetes'));
    }

    public function update(UpdateinscripcionRequest $request, $id)
    {
        $cliente = cliente::where('id', $request->cliente_id)->first();
        if (is_null($cliente)) {
            return back()->withErrors(['Id del cliente no existe']);
        }
        $inscripcion = inscripcion::findOrFail($id);
        $inscripcion->update($request->all());
        $inscripcion->total = 0;
        $inscripcion->save();

        $detalles = detalle_inscripcion::where('inscripcion_id', $inscripcion->id);
        $detalles->delete();

        $grupos = grupo::all(); 
        for ($i=1; $i <= count($grupos); $i++) { 
            if ($request->filled($i)) {
                $detalle = new detalle_inscripcion();
                $disciplina = disciplina::where('id', $request->$i)->first();
                $detalle->grupo_id = $i;
                $detalle->disciplina_id = $disciplina->id;
                $detalle->inscripcion_id = $inscripcion->id;
                $detalle->precio = $disciplina->precio;
                $detalle->save();
            }
        }
        return redirect()->route('inscripciones.index');
    }

    public function destroy($id)
    {
        $inscripcion = inscripcion::findOrFail($id);
        $detalles = detalle_inscripcion::where('inscripcion_id', $inscripcion->id);
        $detalles->delete();
        $inscripcion->delete();
        return redirect()->route('inscripciones.index');
    }

}
