<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lanches = [
            [
                'nome' => 'Burguer 1',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 2',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 3',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 4',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 5',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 6',
                'ingredientes' => 'Carne de porco bovina, Pão de trigo trigoso, muito queso',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 7',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso,',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 8',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso,',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 9 ',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso,',
                'preco' => 99.99,
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 10',
                'ingredientes' => 'Carne de boi bovina, Pão de trigo trigoso, muito queso,',
                'preco' => 99.99,
                'imagem' => 'image/hamburgao.jpeg'
            ],
        ];

        foreach ($lanches as $lanche) {
            DB::table('produtos')->insert([
                'nome' => $lanche['nome'],
                'preco' => $lanche['preco'],
                'ingredientes' => $lanche['ingredientes'],
                'imagem' => $lanche['imagem'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
