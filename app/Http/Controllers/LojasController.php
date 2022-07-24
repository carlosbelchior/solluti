<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLojaRequest;
use App\Http\Requests\UpdateLojaRequest;
use App\Models\Loja;

class LojasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Loja::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLojaRequest $request)
    {
        $dadosLoja = $request->validated();
        if(Loja::create($dadosLoja))
            return response()->json([
                'message' => 'Loja cadastrada com sucesso',
                'status' => 'success',
                'type' => 'crud'
            ], 200);

        return response()->json([
            'message' => 'Erro ao cadastrar a loja, verifique sua conexão e tente novamente',
            'status' => 'error',
            'type' => 'crud'
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $loja = Loja::with(['produtos'])->find($id);
        if($loja)
            return $loja;

        return response()->json([
            'message' => 'Loja não encontrada',
            'status' => 'error',
            'type' => 'crud'
        ], 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLojaRequest $request, $id)
    {
        $loja = Loja::find($id);
        if(!$loja)
            return response()->json([
                'message' => 'Loja não encontrada',
                'status' => 'error',
                'type' => 'crud'
            ], 400);

        $dadosLoja = $request->validated();
        if($loja->update($dadosLoja))
            return response()->json([
                'message' => 'Loja atualizada com sucesso',
                'status' => 'success',
                'type' => 'crud'
            ], 200);

        return response()->json([
            'message' => 'Erro ao atualizar a loja, verifique sua conexão e tente novamente',
            'status' => 'error',
            'type' => 'crud'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Loja::find($id)->delete())
            return response()->json([
                'message' => 'Loja deletada com sucesso',
                'status' => 'success',
                'type' => 'crud'
            ], 200);

        return response()->json([
            'message' => 'Erro ao deletar a loja',
            'status' => 'error',
            'type' => 'crud'
        ], 400);
    }
}
