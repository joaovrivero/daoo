<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use App\Models\Produto;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
            Fornecedor::factory(5)->create()->each(function ($fornecedor) {
            Produto::factory(10)->create(['fornecedor_id' => $fornecedor->id]);
        });
    }
}