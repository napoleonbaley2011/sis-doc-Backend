<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('archivo_recuperar', function (Blueprint $table) {
            $table->id();
            $table->integer('id_archivo');
            $table->integer('id_documento');
            $table->string('nombre_archivo');
            $table->string('nombre_etiqueta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivo_recuperar');
    }
};
