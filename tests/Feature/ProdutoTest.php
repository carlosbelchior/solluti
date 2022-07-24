<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    public function test_ok_lista_produtos()
    {
        $response = $this->get('/api/produtos/index');
        $response->assertStatus(200);
    }

    public function test_ok_inserir_produto()
    {
        $response = $this->post('/api/produtos/store', [
            'nome' => 'Produto Teste',
            'valor' => 100.99,
            'loja_id' => 1,
            'ativo' => 1
        ]);
        $response->assertStatus(200);
    }

    public function test_ok_listar_produto()
    {
        $response = $this->get('/api/produtos/show/1');
        $response->assertStatus(200);
    }

    public function test_ok_atualizar_produto()
    {
        $response = $this->post('/api/produtos/update/1', [
            'nome' => 'Produto Teste',
            'valor' => 100.99,
            'loja_id' => 1,
            'ativo' => 0
        ]);
        $response->assertStatus(200);
    }

    public function test_ok_remover_produto()
    {
        $response = $this->get('/api/produtos/destroy/1');
        $response->assertStatus(200);
    }
}
