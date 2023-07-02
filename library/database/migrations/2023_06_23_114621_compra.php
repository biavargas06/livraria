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
        Schema::create('compra', function (Blueprint $table) {
            $table->id('idcompra');
            $table->unsignedBigInteger('usuario_idusr');
            $table->unsignedBigInteger('livro_idlivro');
            $table->unsignedBigInteger('carrinho_idcarrinho');
            $table->timestamps();

            $table->foreign('usuario_idusr')->references('idusr')->on('usuario');
            $table->foreign('livro_idlivro')->references('idlivro')->on('livro');
            $table->foreign('carrinho_idcarrinho')->references('idcarrinho')->on('carrinho');
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
