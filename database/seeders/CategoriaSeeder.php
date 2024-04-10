<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre_categoria' => 'Planear'
        ]);

        Categoria::create([
            'nombre_categoria' => 'Hacer'
        ]);
        Categoria::create([
            'nombre_categoria' => 'Verificar'
        ]);
        Categoria::create([
            'nombre_categoria' => 'Actuar'
        ]);
    }
}
