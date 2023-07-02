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
        Schema::create('genero', function (Blueprint $table) {
            $table->id('idgenero');
            $table->string('nome', 100);
            $table->unsignedBigInteger('livro_idlivro');
            $table->timestamps();

            $table->foreign('livro_idlivro')->references('idlivro')->on('livro');
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
