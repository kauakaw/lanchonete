<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call(CategoriaSeeder::class);

    // Opcional: produtos de exemplo (por ora podemos deixar para a atividade do aluno)
    // \App\Models\Produto::factory()->count(15)->create();
}
}
