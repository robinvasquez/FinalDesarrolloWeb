<?php

namespace App\Http\Controllers;

use App\Models\TipoMarcaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TipoMarcajeController extends Controller
{
    public function obtenerEstado(){
        return TipoMarcaje::all();
    }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoMarcaje  $tipoMarcaje
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMarcaje $tipoMarcaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoMarcaje  $tipoMarcaje
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMarcaje $tipoMarcaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoMarcaje  $tipoMarcaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMarcaje $tipoMarcaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMarcaje  $tipoMarcaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMarcaje $tipoMarcaje)
    {
        //
    }
}
