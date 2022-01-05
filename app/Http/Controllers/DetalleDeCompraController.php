<?php

namespace App\Http\Controllers;

use App\Models\detalle_de_compra;
use App\Http\Requests\Storedetalle_de_compraRequest;
use App\Http\Requests\Updatedetalle_de_compraRequest;

class DetalleDeCompraController extends Controller
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
     * @param  \App\Http\Requests\Storedetalle_de_compraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedetalle_de_compraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detalle_de_compra  $detalle_de_compra
     * @return \Illuminate\Http\Response
     */
    public function show(detalle_de_compra $detalle_de_compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalle_de_compra  $detalle_de_compra
     * @return \Illuminate\Http\Response
     */
    public function edit(detalle_de_compra $detalle_de_compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedetalle_de_compraRequest  $request
     * @param  \App\Models\detalle_de_compra  $detalle_de_compra
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedetalle_de_compraRequest $request, detalle_de_compra $detalle_de_compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalle_de_compra  $detalle_de_compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(detalle_de_compra $detalle_de_compra)
    {
        //
    }
}
