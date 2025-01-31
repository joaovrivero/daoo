<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fornecedor;

class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),
            'telefone' => $this->faker->phoneNumber(),
        ];
    }
}