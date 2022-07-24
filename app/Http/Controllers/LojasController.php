<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLojaRequest;
use App\Http\Requests\UpdateLojaRequest;
use App\Models\Loja;

class LojasController extends Controller
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
     * @param  \App\Http\Requests\StoreLojaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLojaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function show(Loja $loja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function edit(Loja $loja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLojaRequest  $request
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLojaRequest $request, Loja $loja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loja $loja)
    {
        //
    }
}
