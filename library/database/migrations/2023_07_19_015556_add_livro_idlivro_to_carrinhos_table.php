<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('carrinhos', function (Blueprint $table) {
            $table->foreignId('livro_id')->constrained();
            $table->foreignId('usuario_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carrinhos', function (Blueprint $table) {
            $table->foreignId('livro_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('usuario_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }
};