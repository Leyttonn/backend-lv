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

            $table->string("nombre");
            $table->string("tipo")->nullable();
            $table->date("fecha_subida");
            $table->string("archivo")->nullable();
            $table->boolean("estado")->default(true);

            // N : 1
            $table->bigInteger("persona_id")->unsigned();
            $table->foreign("persona_id")->references("id")->on("personas");

            $table->timestamps();
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
