<?php

namespace App\Http\Controllers;

use App\Models\nota_de_compra;
use App\Http\Requests\Storenota_de_compraRequest;
use App\Http\Requests\Updatenota_de_compraRequest;

class NotaDeCompraController extends Controller
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
     * @param  \App\Http\Requests\Storenota_de_compraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storenota_de_compraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nota_de_compra  $nota_de_compra
     * @return \Illuminate\Http\Response
     */
    public function show(nota_de_compra $nota_de_compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nota_de_compra  $nota_de_compra
     * @return \Illuminate\Http\Response
     */
    public function edit(nota_de_compra $nota_de_compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatenota_de_compraRequest  $request
     * @param  \App\Models\nota_de_compra  $nota_de_compra
     * @return \Illuminate\Http\Response
     */
    public function update(Updatenota_de_compraRequest $request, nota_de_compra $nota_de_compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nota_de_compra  $nota_de_compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(nota_de_compra $nota_de_compra)
    {
        //
    }
}
