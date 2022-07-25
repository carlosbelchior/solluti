<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Mail\ProdutoMail;
use App\Models\Produto;
use Illuminate\Support\Facades\Mail;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        $dadosProduto = $request->validated();

        if(Produto::create($dadosProduto))
        {
            $mailData = [
                'nome' => $dadosProduto['nome'],
                'valor' => $dadosProduto['valor'],
                'loja_id' => $dadosProduto['loja_id'],
                'ativo' => $dadosProduto['ativo']
            ];

            try {
                Mail::to('seu_email@provedor.com')->send(new ProdutoMail($mailData));
            } catch (\Exception $e){}

            return response()->json([
                'message' => 'Produto cadastrado com sucesso',
                'status' => 'success',
                'type' => 'crud'
            ], 200);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o produto, verifique sua conexão e tente novamente',
            'status' => 'error',
            'type' => 'crud'
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if($produto)
            return $produto;

        return response()->json([
            'message' => 'Produto não encontrado',
            'status' => 'error',
            'type' => 'crud'
        ], 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, $id)
    {
        $produto = Produto::find($id);
        if(!$produto)
            return response()->json([
                'message' => 'Produto não encontrado',
                'status' => 'error',
                'type' => 'crud'
            ], 400);

        $dadosProduto = $request->validated();
        if($produto->update($dadosProduto))
            return response()->json([
                'message' => 'Produto atualizado com sucesso',
                'status' => 'success',
                'type' => 'crud'
            ], 200);

        return response()->json([
            'message' => 'Erro ao atualizar o produto, verifique sua conexão e tente novamente',
            'status' => 'error',
            'type' => 'crud'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Produto::find($id)->delete())
            return response()->json([
                'message' => 'Produto deletado com sucesso',
                'status' => 'success',
                'type' => 'crud'
            ], 200);

        return response()->json([
            'message' => 'Erro ao deletar o produto',
            'status' => 'error',
            'type' => 'crud'
        ], 400);
    }
}
