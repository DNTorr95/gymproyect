<?php

namespace App\Http\Controllers;

use App\Models\control_de_peso;
use App\Models\cliente;
use App\Models\persona;
use App\Http\Requests\Storecontrol_de_pesoRequest;
use App\Http\Requests\Updatecontrol_de_pesoRequest;

use Illuminate\Support\Carbon;

class ControlDePesoController extends Controller
{
    
    public function create($cliente_id) 
    {
        $cliente = cliente::findOrFail($cliente_id);
        $persona = persona::where('id', $cliente->persona_id)->first();
        return view('gestionar_peso.create', compact('cliente', 'persona'));
    }

    public function store(Storecontrol_de_pesoRequest $request, $cliente_id) 
    {
        $cliente = cliente::where('id', $cliente_id)->first();
        if (is_null($cliente)) {
            return back()->withErrors(['Id del cliente no existe']);
        } 
        $p = new control_de_peso();
        $p->altura = $request->altura;
        $p->peso = $request->peso;
        $p->imc = $request->imc;
        $now = Carbon::now();
        $p->fecha = $now->format('Y-m-d');
        $p->cliente_id = $cliente->id;
        $p->save();
        $persona  = persona::where('id', $cliente->persona_id)->first();

        return redirect()->route('personas.clientes.show', $persona->id);
    }
   
    public function edit($id, $persona_id) 
    {
        $peso = control_de_peso::findOrFail($id);
        $persona = persona::where('id', $persona_id)->first();
        return view('gestionar_peso.edit', compact('peso', 'persona'));
    }

    public function update(Updatecontrol_de_pesoRequest $request, $id, $persona_id) 
    {
        $p = control_de_peso::findOrFail($id);
        $p->altura = $request->altura;
        $p->peso = $request->peso;
        $p->imc = $request->imc;
        $p->save();
        return redirect()->route('personas.clientes.show', $persona_id);
    }

    public function destroy($id, $persona_id)
    {
        $peso = control_de_peso::findOrFail($id);
        $peso->delete();
        
        return redirect()->route('personas.clientes.show', $persona_id);
    }

}
