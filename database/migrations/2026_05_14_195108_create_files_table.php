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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('model_type', 80)->comment('Tipo de modelo');
            $table->unsignedBigInteger('model_id')->comment('Modelo');
            $table->string('disk', 30)->comment('Disco donde se almacenó el archivo');
            $table->string('name', 20)->comment('Nombre del archivo almacenado');
            $table->timestamps();

            $table->comment('Archivos');
        });
    }

    /**
     * Reversar migración.
     *
     * @return void
     * @author Daniel Beltrán
     */
    public function down(): void {
        Schema::dropIfExists('files');
    }
};
