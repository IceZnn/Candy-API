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
        Schema::create('doces', function (Blueprint $table) {
            $table->id();
            $table->text("Nome");
            $table->text("Sabor");
            $table->text("Ingredientes");
            $table->integer("Preço");
            $table->text("Alérgicos");
            $table->integer("Quantidade");
            $table->text("Descrição");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doces');
    }
};
