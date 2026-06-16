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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('Autor');
            $table->foreignId('category_id')->constrained()->nullable()->comment('Categoría');
            $table->string('title', 60)->comment('Título');
            $table->text('content')->comment('Contenido');
            $table->timestamps();

            $table->comment('Publicaciones de usuarios');
        });
    }

    /**
     * Reversar migración.
     *
     * @return void
     * @author Daniel Beltrán
     */
    public function down(): void {
        Schema::dropIfExists('posts');
    }
};
