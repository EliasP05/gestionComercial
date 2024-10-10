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
        Schema::create('det_ventas', function (Blueprint $table) {
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('prod_id');
            $table->decimal('det_prod_costo',10,2);
            $table->decimal('det_prod_precio',10,2);
            $table->integer('det_cantidad');
            $table->timestamps();

            //Defino la cable compuesta
            $table->primary(['venta_id','prod_id']);

            // Definición de la clave foránea
            $table->foreign('venta_id')
            ->references('venta_id')
            ->on('ventas')
            ->onDelete('RESTRICT');

            $table->foreign('prod_id')
            ->references('prod_id')
            ->on('productos')
            ->onDelete('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('det_ventas');
    }
};
