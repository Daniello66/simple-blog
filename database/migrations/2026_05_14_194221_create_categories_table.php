<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Ejecutar migración.
     *
     * @return void
     * @author Daniel Beltrán
     */
    public function up(): void {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->comment('Categoría');
            $table->timestamps();

            $table->comment('Categorías disponibles para posts');
        });
    }

    /**
     * Reversar migración.
     *
     * @return void
     * @author Daniel Beltrán
     */
    public function down(): void {
        Schema::dropIfExists('categories');
    }
};
