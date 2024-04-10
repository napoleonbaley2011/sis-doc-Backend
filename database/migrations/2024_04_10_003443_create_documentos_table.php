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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo_documento');
            $table->integer('estado_doc');
            $table->date('fecha_creacion');
            $table->date('fecha_modificacion');
            $table->foreignId('id_users')->constrained('users');
            $table->integer('id_categoria')->nullable();
            $table->integer('id_tipo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
