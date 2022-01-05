<?php

namespace App\Http\Controllers;

use App\Models\detalle_mantenimiento;
use App\Http\Requests\Storedetalle_mantenimientoRequest;
use App\Http\Requests\Updatedetalle_mantenimientoRequest;

class DetalleMantenimientoController extends Controller
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
     * @param  \App\Http\Requests\Storedetalle_mantenimientoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedetalle_mantenimientoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detalle_mantenimiento  $detalle_mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(detalle_mantenimiento $detalle_mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalle_mantenimiento  $detalle_mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(detalle_mantenimiento $detalle_mantenimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedetalle_mantenimientoRequest  $request
     * @param  \App\Models\detalle_mantenimiento  $detalle_mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedetalle_mantenimientoRequest $request, detalle_mantenimiento $detalle_mantenimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalle_mantenimiento  $detalle_mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(detalle_mantenimiento $detalle_mantenimiento)
    {
        //
    }
}
