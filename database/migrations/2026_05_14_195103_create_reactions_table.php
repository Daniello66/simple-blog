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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->string('model_type', 80)->comment('Tipo de modelo');
            $table->unsignedBigInteger('model_id')->comment('Modelo');
            $table->foreignId('user_id')->constrained()->comment('Autor');
            $table->timestamps();

            $table->comment('Reacciones');
        });
    }

    /**
     * Reversar migración.
     *
     * @return void
     * @author Daniel Beltrán
     */
    public function down(): void {
        Schema::dropIfExists('reactions');
    }
};
