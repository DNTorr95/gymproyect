<?php

namespace App\Http\Controllers;

use App\Models\instructor;
use App\Http\Requests\StoreinstructorRequest;
use App\Http\Requests\UpdateinstructorRequest;
use App\Models\persona;

use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{

   public function index()
   {
      //$instructores = instructor::all();
      $personas = persona::where('tipo', 'I')->get();
      $personas->load('instructor');
      return view('gestionar_instructor.index', compact('personas'));
   }

   public function edit($persona_id) {
      $persona = persona::findOrFail($persona_id);
      $persona->load('instructor');
      return view('gestionar_instructor.edit', ['persona' => $persona]);
  }

  public function update(UpdateinstructorRequest $request, $persona_id)
  {
      $persona_ci = persona::where('ci', $request->ci)
          ->where('id', '!=', $persona_id)->first();
      if (!is_null($persona_ci)) {
          return back()->withErrors(['Ci ya esta registrado, intente con otro']);
      }
      $persona_huella = persona::where('url_huella', $request->url_huella)
          ->where('id', '!=', $persona_id)->first();
      if (!is_null($persona_huella) && !is_null($request->url_huella)) {
          return back()->withErrors(['Huella ya esta registrado, intente con otro']);
      }
      $persona_email = persona::where('email', $request->email)
          ->where('id', '!=', $persona_id)->first();
      if (!is_null($persona_email)) {
          return back()->withErrors(['Email ya esta registrado, intente con otro']);
      }
      //actualiza la infomarcion y redirecciona
      $persona = persona::findOrFail($persona_id);
      $personaAux = $request->only([
          'ci', 'nombre', 'apellido', 'url_huella', 'tel', 'email',
          'fecha_naci',
      ]);
      $persona->update($personaAux);
      if ($request->hasfile('foto')) {
          $imagen = $request->file('foto')->store('public/personas');
          $url = Storage::url($imagen);
          $persona->foto = $url;
          $persona->save();
      }
      $instructor = instructor::where('persona_id', $persona_id)->first();
      $instructor->especialidad = $request->especialidad;
      $instructor->save();
      
      return redirect()->route('personas.instructores.index');  
  }
}
