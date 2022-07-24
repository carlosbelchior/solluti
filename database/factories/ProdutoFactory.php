<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->firstName(),
            'valor' => fake()->unique()->randomFloat(2, 1, 100),
            'loja_id' => fake()->numberBetween(1, 10),
            'ativo' => fake()->boolean(),
        ];
    }
}
