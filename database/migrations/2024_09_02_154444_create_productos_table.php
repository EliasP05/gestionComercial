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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('prod_id');
            $table->string('prod_cod');
            $table->string('prod_nom');
            $table->string('prod_descripcion')->nullable();
            $table->decimal('prod_costo',10,2);
            $table->decimal('prod_precio',10,2);
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->integer('prod_stock')->default(0);
            $table->integer('prod_stock_min')->default(0);
            $table->timestamps();

            // Definición de la clave foránea
    $table->foreign('marca_id') // Nombre del campo que será clave foránea
        ->references('marca_id')    // Campo referenciado en la tabla 'marcas'
        ->on('marcas')        // Tabla referenciada
        ->onDelete('set null'); // Acción en caso de eliminar la marca
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
