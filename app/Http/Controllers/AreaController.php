<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Http\Requests\StoreareaRequest;
use App\Http\Requests\UpdateareaRequest;
use Illuminate\Http\Request;

class AreaController extends Controller
{
   public function index()
   {
       $areas = area::all();
       return view('gestionar_area.index', compact('areas'));
   }

   public function create()
   {
       return view('gestionar_area.create');
   }

   public function store(StoreareaRequest $request)
   {
        $area = new area();
        $area->nombre = $request->nombre;
        $area->save();

        return redirect()->route('areas.index');
   }

   public function edit($id)
   {
        $area = area::findOrFail($id);
        return view('gestionar_area.edit', compact('area'));
   }

   public function update(UpdateareaRequest $request, $id) 
   {
        $area_nombre = area::where('nombre', $request->nombre)->where('id', '!=', $id)->first();
        if (!is_null($area_nombre)) {
            return back()->withErrors(['Nombre ya esta registrado, intente con otro']);
        }  
        $area = area::findOrFail($id);
        $area->nombre = $request->nombre;
        $area->save();
        return redirect()->route('areas.index');
   }

   public function destroy($id)
   {
        $area = area::findOrFail($id);
        $area->delete();
        return redirect()->route('areas.index');
   }

}
