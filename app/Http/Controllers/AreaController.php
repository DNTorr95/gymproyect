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
       $areas = Area::all();
       return view('gestionar_area.index', compact('areas'));
   }

   public function create()
   {
       return view('gestionar_area.create');
   }

   public function store(StoreareaRequest $request)
   {
        $area = new Area();
        $area->nombre = $request->nombre;
        $area->save();

        return redirect()->route('areas.index');
   }

   public function edit($id)
   {
        $area = Area::findOrFail($id);
        return view('gestionar_area.edit', compact('area'));
   }

   public function update(UpdateareaRequest $request, $id) 
   {
        $area_nombre = Area::where('nombre', $request->nombre)->where('id', '!=', $id)->first();
        if (!is_null($area_nombre)) {
            return back()->withErrors(['Nombre ya esta registrado, intente con otro']);
        }  
        $area = Area::findOrFail($id);
        $area->nombre = $request->nombre;
        $area->save();
        return redirect()->route('areas.index');
   }

   public function destroy($id)
   {
        $area = Area::findOrFail($id);
        $area->delete();
        return redirect()->route('areas.index');
   }

}
