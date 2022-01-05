<?php

namespace App\Http\Controllers;

use App\Models\mantenimiento;
use App\Http\Requests\StoremantenimientoRequest;
use App\Http\Requests\UpdatemantenimientoRequest;

class MantenimientoController extends Controller
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
     * @param  \App\Http\Requests\StoremantenimientoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremantenimientoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemantenimientoRequest  $request
     * @param  \App\Models\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemantenimientoRequest $request, mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(mantenimiento $mantenimiento)
    {
        //
    }
}
