<?php

namespace App\Http\Controllers;

use App\Models\persona;
use App\Http\Requests\StorepersonaRequest;
use App\Http\Requests\UpdatepersonaRequest;
use App\Models\administrador;
use App\Models\instructor;
use App\Models\cliente;
use App\Policies\AdministradorPolicy;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class PersonaController extends Controller
{

    public function create() 
    {
        return view('gestionar_persona.create');
    }
    public function store(StorepersonaRequest $request)
    {
        if ($request->tipo == 'I') {
            $validate = $request->validate(['especialidad' => 'required|max:20']);
        }
        if ($request->tipo == 'C') {
            $validate = $request->validate(['edad' => 'required|max:3']);
        }
        if ($request->tipo == 'A') {
            $validate = $request->validate(['usuario' => 'required|string|min:3|max:15|unique:administradors']);
            $validate2 = $request->validate(['password' => 'required|string|min:4|confirmed']);

        }
        $persona = new Persona($request->only([
            'ci', 'nombre', 'apellido', 'url_huella', 'tel', 'email',
            'foto', 'fecha_naci', 'genero', 'tipo',
        ]));
        if ($request->hasfile('foto')) {
            $imagen = $request->file('foto')->store('public/personas');
            $url = Storage::url($imagen);
            $persona->foto = $url;
        } else {
            if ($request->genero == 'M') {
                $persona->foto = 'storage/personas/usuariohombre.jpg';
            } else {
                $persona->foto = 'storage/personas/usuariomujer.jpg';
            }
        }
        $persona->save();

        if ($request->tipo == 'I') {
            $instructor = new Instructor();
            $instructor->especialidad = $request->input('especialidad');
            $instructor->persona_id = $persona->id;
            $instructor->save();
        }
        if ($request->tipo == 'C') {
            $cliente = new Cliente();
            $cliente->edad = $request->input('edad');
            $cliente->persona_id = $persona->id;
            $cliente->save();
        }
        if ($request->tipo == 'A') {
            $administrador = new administrador();
            $administrador->persona_id = $persona->id;
            $administrador->usuario = $request->usuario;
            $administrador->password = bcrypt($request->input('password'));
            $administrador->save();
        }
        if ($request->tipo == 'I') {
            return redirect()->route('personas.instructores.index'); 
        }
        if ($request->tipo == 'C') {
            return redirect()->route('personas.clientes.index'); 
        }
        if ($request->tipo == 'A') {
            return redirect()->route('personas.administradores.index'); 
        }
        return redirect()->route('menu'); 
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->load('administrador');
        $persona->load('cliente');
        $persona->load('instructor');
        return view('gestionar_persona.edit', ['persona' => $persona]);
    }

    public function update(UpdatepersonaRequest $request, $id)
    {
        $persona_ci = Persona::where('ci', $request->ci)
            ->where('id', '!=', $id)->first();
        if (!is_null($persona_ci)) {
            return back()->withErrors(['Ci ya esta registrado, intente con otro']);
        }
        $persona_huella = Persona::where('url_huella', $request->url_huella)
            ->where('id', '!=', $id)->first();
        if (!is_null($persona_huella) && !is_null($request->url_huella)) {
            return back()->withErrors(['Huella ya esta registrado, intente con otro']);
        }
        $persona_email = Persona::where('email', $request->email)
            ->where('id', '!=', $id)->first();
        if (!is_null($persona_email)) {
            return back()->withErrors(['Email ya esta registrado, intente con otro']);
        }
        //actualiza la infomarcion y redirecciona
        $persona = Persona::findOrFail($id);
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
        return redirect()->route('menu');
    }

    public function destroy($id) 
    {
        $persona = Persona::findOrFail($id);
        if  ($persona->tipo == 'A') {
            $administrador = Administrador::where('persona_id', $id)->first();
            $administrador->delete();
        } else if  ($persona->tipo == 'C') {
            $cliente = Cliente::where('persona_id', $id)->first();
            $cliente->delete();
        } else {
            $instructor = Instructor::where('persona_id', $id)->first();
            $instructor->delete();
        }
        $persona->delete();
        return redirect()->route('menu');
    }

    /*public function store(Request $request)
    {
        $validateData = $request->validate([
            'ci' => ['required', 'min:5', 'max:10'],
            'nombre' => ['required', 'min:3'],
            'apellido' => ['required', 'min:3'],
            'url_huella',
            'tel',
            'email',
            'foto',
            'fecha_naci',
            'genero' => ['required'],
            'estado',
            'tipo' => ['required', 'max:1'],
        ]);

        $persona = Persona::create($validateData);

        return redirect()->route('clientes.index');
    }*/
}
