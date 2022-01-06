<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\categoria;
use App\Http\Requests\StoreproductoRequest;
use App\Http\Requests\UpdateproductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = producto::all();
        return view('gestionar_producto.index', compact('productos'));
    }

    public function create()
    {
        $categorias = categoria::all();
        return view('gestionar_producto.create', compact('categorias'));
    }

    public function store(StoreproductoRequest $request)
    {
        $producto = new producto($request->all());
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function edit($id)
    {
        $producto = producto::findOrFail($id);
        $categorias = categoria::all();
        return view('gestionar_producto.edit', compact('categorias', 'producto')); 
    }

    public function update(UpdateproductoRequest $request, $id)
    {
        $producto = producto::findOrFail($id);
        $producto->update($request->all());
        //$producto->categoria_id = $request->categoria_id;
        //$producto->save();
        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $producto = producto::findOrFail($id);
        $producto->delete(); 
        return redirect()->route('productos.index');
    }
}
