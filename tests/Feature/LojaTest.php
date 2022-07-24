<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LojaTest extends TestCase
{
    public function test_ok_lista_lojas()
    {
        $response = $this->get('/api/lojas/index');
        $response->assertStatus(200);
    }

    public function test_ok_inserir_loja()
    {
        $response = $this->post('/api/lojas/store', [
            'nome' => 'Loja Teste',
            'email' => 'teste@gmail.com'
        ]);
        $response->assertStatus(200);
    }

    public function test_ok_listar_loja()
    {
        $response = $this->get('/api/lojas/show/1');
        $response->assertStatus(200);
    }

    public function test_ok_atualizar_loja()
    {
        $response = $this->post('/api/lojas/update/11', [
            'nome' => 'Loja Teste 2',
            'email' => 'teste@gmail.com'
        ]);
        $response->assertStatus(200);
    }

    public function test_ok_remover_loja()
    {
        $response = $this->get('/api/lojas/destroy/2');
        $response->assertStatus(200);
    }
}
