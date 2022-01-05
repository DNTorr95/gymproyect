<?php

namespace App\Http\Controllers;

use App\Models\pieza;
use App\Http\Requests\StorepiezaRequest;
use App\Http\Requests\UpdatepiezaRequest;

class PiezaController extends Controller
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
     * @param  \App\Http\Requests\StorepiezaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepiezaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function show(pieza $pieza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function edit(pieza $pieza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepiezaRequest  $request
     * @param  \App\Models\pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepiezaRequest $request, pieza $pieza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function destroy(pieza $pieza)
    {
        //
    }
}
