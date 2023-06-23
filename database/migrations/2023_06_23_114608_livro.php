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
        Schema::create('livro', function (Blueprint $table) {
            $table->id('idlivro');
            $table->string('nome', 100);
            $table->string ('pag', 100);
            $table->string ('autor', 100);
            $table->string('editora', 100);
            $table->string ('ano', 100);
            $table->string ('sinopse', 100);
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
