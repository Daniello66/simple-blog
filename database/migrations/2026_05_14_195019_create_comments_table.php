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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->comment('Publicación');
            $table->foreignId('user_id')->constrained()->comment('Autor');
            $table->text('content')->comment('Comentario');
            $table->timestamps();

            $table->comment('Comentarios de publicaciones');
        });
    }

    /**
     * Reversar migración.
     *
     * @return void
     * @author Daniel Beltrán
     */
    public function down(): void {
        Schema::dropIfExists('comments');
    }
};
