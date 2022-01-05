<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Http\Requests\StorecategoriaRequest;
use App\Http\Requests\UpdatecategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('gestionar_categoria.index', compact('categorias'));
    }

    public function create()
    {
        return view('gestionar_categoria.create');
    }

    public function store(StorecategoriaRequest $request)
    {
        $categoria = new Categoria($request->all());
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('gestionar_categoria.edit', compact('categoria'));
    }

    public function update(UpdatecategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }

}
