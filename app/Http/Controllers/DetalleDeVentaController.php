<?php

namespace App\Http\Controllers;

use App\Models\detalle_de_venta;
use App\Http\Requests\Storedetalle_de_ventaRequest;
use App\Http\Requests\Updatedetalle_de_ventaRequest;

class DetalleDeVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storedetalle_de_ventaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedetalle_de_ventaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detalle_de_venta  $detalle_de_venta
     * @return \Illuminate\Http\Response
     */
    public function show(detalle_de_venta $detalle_de_venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalle_de_venta  $detalle_de_venta
     * @return \Illuminate\Http\Response
     */
    public function edit(detalle_de_venta $detalle_de_venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedetalle_de_ventaRequest  $request
     * @param  \App\Models\detalle_de_venta  $detalle_de_venta
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedetalle_de_ventaRequest $request, detalle_de_venta $detalle_de_venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalle_de_venta  $detalle_de_venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(detalle_de_venta $detalle_de_venta)
    {
        //
    }
}
