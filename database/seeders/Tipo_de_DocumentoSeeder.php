<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo_de_Documento;
class Tipo_de_DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipo_de_Documento::create([
            'tipo_documento' => 'Procedimientos'
        ]);
        Tipo_de_Documento::create([
            'tipo_documento' => 'Planes'
        ]);
        Tipo_de_Documento::create([
            'tipo_documento' => 'Registros'
        ]);
        Tipo_de_Documento::create([
            'tipo_documento' => 'Informes'
        ]);
        Tipo_de_Documento::create([
            'tipo_documento' => 'Documentos Legales'
        ]);
    }
}
