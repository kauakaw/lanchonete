<?php
namespace Database\Seeders;
use App\Models\Categoria;
use Illuminate\Database\Seeder;
class ProdutoSeeder extends Seeder
{
    public function run(): void
{
    $fixas = [
            ['categoria_id' => 2,'nome' => 'scat', 'descricao' => 'Sucos, refrigerantes e água', 'preco' => 35.00, 'ativa' => true],
            ['categoria_id' => 4,'nome' => 'tryt', 'descricao' => 'Sucos, refrigerantes e água', 'preco' => 36.00, 'ativa' => true],
    ];
    foreach ($fixas as $c) {
        Produto::firstOrCreate(['nome' => $c['nome']], $c);
    }

    // Complemento com dados fake
    Produto::factory()->count(5)->create();
    }
}
