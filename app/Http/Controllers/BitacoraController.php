<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use App\Http\Requests\StorebitacoraRequest;
use App\Http\Requests\UpdatebitacoraRequest;

class BitacoraController extends Controller
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
     * @param  \App\Http\Requests\StorebitacoraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebitacoraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function show(bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function edit(bitacora $bitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebitacoraRequest  $request
     * @param  \App\Models\bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebitacoraRequest $request, bitacora $bitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function destroy(bitacora $bitacora)
    {
        //
    }
}
