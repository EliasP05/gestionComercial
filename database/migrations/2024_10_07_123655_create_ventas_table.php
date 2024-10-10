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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('venta_id');
            $table->unsignedBigInteger('usu_id')->nullable();
            $table->decimal('venta_total',10,2);
            $table->timestamps();

             //defino clave foranea
        $table->foreign('usu_id')
            ->references('usu_id')
            ->on('users')
            ->onDelete('RESTRICT');
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
