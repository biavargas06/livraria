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
        Schema::create('carrinho', function (Blueprint $table) {
            $table->id('idcarrinho');
            $table->unsignedBigInteger('livro_idlivro');
            $table->unsignedBigInteger('usuario_idusr');
            $table->timestamps();

            $table->foreign('livro_idlivro')->references('idlivro')->on('livro');
            $table->foreign('usuario_idusr')->references('idusr')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
