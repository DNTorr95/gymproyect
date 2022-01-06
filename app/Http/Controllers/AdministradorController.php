<?php

namespace App\Http\Controllers;

use App\Models\administrador;
use App\Models\persona;
use Illuminate\Http\Request;
use App\Http\Requests\StoreadministradorRequest;
use App\Http\Requests\UpdateadministradorRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class AdministradorController extends Controller
{

  public function index()
  {
    $personas  = persona::where('tipo', 'A')->get();
  /*   return $personas;
    $personas->load('administrador'); */
    return view('gestionar_administrador.index', compact('personas'));
  }

  public function loginView()
  {
    
    return view('login');
  }

  public function login(Request $request)
  {
    $validateData = $request->validate([
      'usuario' => ['required', 'max:50'],
      'password' => ['required'],
    ]);
    $administrador = administrador::where('usuario', $request->usuario)->first();

    if (is_null($administrador)) {
      return back()->withErrors(['error' => 'el usuario no existe']);
    }
    if (Auth::guard('admin')->attempt(['usuario' => $request->usuario, 'password' => $request->password])) {

      return redirect()->route('menu');
    }
    return back()->withErrors(['Error' => 'la contraseña es incorrecta']);
  }

  public function menu()
  {  
    return view('menu');
  }

  public function edit($persona_id)
  {
    $persona = persona::findOrFail($persona_id);
    $persona->load('administrador');
    return view('gestionar_administrador.edit', ['persona' => $persona]);
  }

  public function update(UpdateadministradorRequest $request, $persona_id)
  {
    $administrador_usuario = administrador::where('usuario', $request->usuario)
      ->where('persona_id', '!=', $persona_id)->first();
    if (!is_null($administrador_usuario)) {
      return back()->withErrors(['Usuario ya esta registrado, intente con otro']);
    }

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
    $administrador = administrador::where('persona_id', $persona_id)->first();
    $administrador->usuario = $request->usuario;
    $administrador->password = bcrypt($request->input('password'));
    $administrador->save();

    return redirect()->route('personas.administradores.index');
  }
  public function logout(){
    Auth::guard('admin')->logout();
    return redirect()->route('login.view');
  }
}
