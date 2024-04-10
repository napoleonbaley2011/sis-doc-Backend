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

        //INSERT INTO `tipo_de__documentos` (`id`, `created_at`, `updated_at`, `tipo_documento`) VALUES (NULL, NULL, NULL, 'Procedimientos'), (NULL, NULL, NULL, 'Planes'), (NULL, NULL, NULL, 'Registros'), (NULL, NULL, NULL, 'Informes'), (NULL, NULL, NULL, 'Documentos Legales');
    }
}
