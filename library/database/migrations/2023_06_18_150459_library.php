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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('idusr');
            $table->string('nome', 100);
            $table->string ('email', 100);
            $table->string ('senha', 100);
        });

        Schema::create('livro', function (Blueprint $table) {
            $table->id('idlivro');
            $table->string('nome', 100);
            $table->string ('email', 100);
            $table->string ('senha', 100);
            $table->string('nome', 100);
            $table->string ('email', 100);
            $table->string ('senha', 100);
        });

        Schema::create('carrinho', function (Blueprint $table) {
            $table->id('idusr');
            $table->string('nome', 100);
            $table->string ('email', 100);
            $table->string ('senha', 100);
        });

        Schema::create('compra', function (Blueprint $table) {
            $table->id('idusr');
            $table->string('nome', 100);
            $table->string ('email', 100);
            $table->string ('senha', 100);
        });

        Schema::create('genero', function (Blueprint $table) {
            $table->id('idusr');
            $table->string('nome', 100);
            $table->string ('email', 100);
            $table->string ('senha', 100);
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->id('idusr');
            $table->string('nome', 100);
            $table->string ('email', 100);
            $table->string ('senha', 100);
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
