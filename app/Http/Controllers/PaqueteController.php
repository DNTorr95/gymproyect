<?php

namespace App\Http\Controllers;

use App\Models\paquete;
use App\Http\Requests\StorepaqueteRequest;
use App\Http\Requests\UpdatepaqueteRequest;

class PaqueteController extends Controller
{
    
    public function index()
    {
       $paquetes = paquete::all();
       return view('gestionar_paquete.index', compact('paquetes'));
    }

    public function create()
    {
        return view('gestionar_paquete.create');
    }

    public function store(StorepaqueteRequest $request)
    {
        $paquete = new paquete($request->all());
        $paquete->save();
        return redirect()->route('paquetes.index');
    }

    public function edit($id) 
    {
        $paquete = paquete::findOrFail($id);
        return view('gestionar_paquete.edit', compact('paquete')); 
    }                                        

    public function update(UpdatepaqueteRequest $request, $id)
    {
        $paquete = paquete::findOrFail($id);
        $paquete->update($request->all());
        return redirect()->route('paquetes.index');
    }

    public function destroy($id) 
    {
        $paquete = paquete::findOrFail($id); 
        $paquete->delete();
        return redirect()->route('paquetes.index');
    }

}
