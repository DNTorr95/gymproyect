<?php

namespace App\Http\Controllers;

use App\Models\nota_de_venta;
use App\Models\producto;
use App\Models\cliente;
use App\Http\Requests\Storenota_de_ventaRequest;
use App\Http\Requests\Updatenota_de_ventaRequest;
use App\Models\detalle_de_venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaDeVentaController extends Controller
{
   public function index()
   {
       $notasDeVentas = nota_de_venta::all();
       return view('gestionar_notaDeVenta.index', compact('notasDeVentas'));
   }


   public function create()
   {
       $productos = Producto::all();
       $productos->load('categoria');
       return view('gestionar_notaDeVenta.create', compact('productos'));
   }

   public function store(Storenota_de_ventaRequest $request)
   {
        //return dd($request->all());
        $cliente = Cliente::where('id', $request->cliente_id)->first();
        if (is_null($cliente)) {
            return back()->withErrors(['Id del cliente no existe']);
        }
        $productos = Producto::all(); 
        for ($i=1; $i <= count($productos); $i++) { 
            if ($request->filled($i)) {
                if ($productos[$i-1]->stock < $request->$i) {
                    return back()->withErrors(['No hay stock suficiente de '.$productos[$i-1]->nombre]);
                }
            }
        }      
        
        $nota = new nota_de_venta($request->all());
        $nota->monto = 0;
        $nota->administrador_id = Auth::user()->id;
        $nota->save();
        for ($i=1; $i <= count($productos); $i++) { 
            if ($request->filled($i)) {
                $detalle = new detalle_de_venta();
                $detalle->nventa_id = $nota->id;
                $detalle->producto_id = $i;
                $detalle->cantidad = $request->$i;
                $detalle->save();
                $nota->monto = $nota->monto + ($detalle->cantidad * $productos[$i-1]->precio);
                $productos[$i-1]->stock = $productos[$i-1]->stock - ($request->$i);
                $productos[$i-1]->save();
                $nota->save();
            }
        } 
        //return back()->with('notificion', 'nota de venta creado con exito');
        return redirect()->route('notaDeVentas.index');
   }

   

}
