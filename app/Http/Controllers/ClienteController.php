<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\persona;
use App\Models\control_de_peso;
use App\Http\Requests\StoreclienteRequest;
use App\Http\Requests\UpdateclienteRequest;
use App\Http\Requests\UpdatepersonaRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
 
    public function index() 
    {   
        $personas = Persona::where('tipo', 'C')->get();
        $personas->load('cliente');
        return view('gestionar_cliente.index', compact('personas'));
    }

    public function create()
    {
        return view('gestionar_cliente.create');
    }

    public function store(StoreclienteRequest $request) {
        $persona = new Persona();
        $persona->ci = $request->input('ci');
        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        //if  ($request->has('huella')) {
            $persona->url_huella = $request->input('huella');
        //}
        //if  ($request->has('telefono')) {
            $persona->tel = $request->input('telefono');
        //}
        $persona->email = $request->input('email');
        $persona->foto = $request->input('foto');
        $persona->fecha_naci = $request->input('fecha');
        $persona->genero = $request->input('genero');
        $persona->tipo = 'C';
        $persona->estado = 1;
        $persona->save();

        $cliente = new Cliente();
        $cliente->edad = $request->input('edad');
        $cliente->persona_id = $persona->id;
        $cliente->save();

        return redirect()->route('personas.clientes.index');  
    }

    public function edit($persona_id) {
        $persona = Persona::findOrFail($persona_id);
        $persona->load('cliente');
        return view('gestionar_cliente.edit', ['persona' => $persona]);
    }

    public function update(UpdateclienteRequest $request, $persona_id)
    {
        $persona_ci = Persona::where('ci', $request->ci)
            ->where('id', '!=', $persona_id)->first();
        if (!is_null($persona_ci)) {
            return back()->withErrors(['Ci ya esta registrado, intente con otro']);
        }
        $persona_huella = Persona::where('url_huella', $request->url_huella)
            ->where('id', '!=', $persona_id)->first();
        if (!is_null($persona_huella) && !is_null($request->url_huella)) {
            return back()->withErrors(['Huella ya esta registrado, intente con otro']);
        }
        $persona_email = Persona::where('email', $request->email)
            ->where('id', '!=', $persona_id)->first();
        if (!is_null($persona_email)) {
            return back()->withErrors(['Email ya esta registrado, intente con otro']);
        }
        //actualiza la infomarcion y redirecciona
        $persona = Persona::findOrFail($persona_id);
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
        $cliente = Cliente::where('persona_id', $persona_id)->first();
        $cliente->edad = $request->edad;
        $cliente->save();
        
        return redirect()->route('personas.clientes.index');  
    }

    public function show($persona_id) 
    {
        $persona = Persona::findOrFail($persona_id);
        $cliente = Cliente::where('persona_id', $persona_id)->first();
        $cliente->load('peso');
        return view('gestionar_cliente.show', compact('persona', 'cliente'));
    }
}
