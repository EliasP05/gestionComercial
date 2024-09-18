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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('tip_id')->nullable()->after('usu_apellido');


                    // Definición de la clave foránea
    $table->foreign('tip_id') // Nombre del campo que será clave foránea
    ->references('tip_id')    // Campo referenciado en la tabla 'tipo'
    ->on('tipo_usuario')        // Tabla referenciada
    ->restrictOnDelete(); // Acción en caso de eliminar el tipo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
