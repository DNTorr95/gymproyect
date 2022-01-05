<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use App\Models\persona;
use App\Http\Requests\StoreasistenciaRequest;
use App\Http\Requests\UpdateasistenciaRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AsistenciaController extends Controller
{
    
    public function index()
    {
        $asistencias = Asistencia::all();
        $asistencias->load('persona');
        return view('gestionar_asistencia.index', compact('asistencias'));
    }

    public function store(StoreasistenciaRequest $request) 
    {
        $persona = Persona::where('ci', $request->ci)->first();
        if  (is_null($persona)) {
            return back()->withErrors(['Ci no existe']);
        }
        $asistencia = new Asistencia();
        $asistencia->persona_id = $persona->id;
        $now = Carbon::now();
        //$f = $now->format('Y-m-d H:i:s A'); // si es am o pm
        $asistencia->fecha = $now->format('Y-m-d H:i:s');// Year/month/day Hora:minuto:segundo
        $asistencia->dia = $now->format('D');
        
        $asistencia->save();
        return redirect()->route('asistencias.index');
    }

    public function edit($id) 
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->load('persona');
        //$persona = Persona::findOrFail($persona_id);
        return view('gestionar_asistencia.edit', ['asistencia' => $asistencia]);
    }

    public function update(UpdateasistenciaRequest $request , $id) 
    {
        $persona = Persona::where('ci', $request->ci)->first();
        if  (is_null($persona)) {
            return back()->withErrors(['Ci no existe']);
        }
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->persona_id = $persona->id;
        $asistencia->save();

        return redirect()->route('asistencias.index');
    }

    public function destroy($id) 
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();
        return redirect()->route('asistencias.index');
    }
}
