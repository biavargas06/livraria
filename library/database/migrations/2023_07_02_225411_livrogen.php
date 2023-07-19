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
        Schema::create('livrogens', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('genero_idgenero');
            // $table->unsignedBigInteger('livro_idlivro');
            $table->timestamps();

            // $table->foreign('livro_idlivro')->references('idlivro')->on('livros');
            // $table->foreign('genero_idgenero')->references('idgenero')->on('generos');
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
