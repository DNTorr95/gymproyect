<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaDeVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_de_ventas', function (Blueprint $table) {
            $table->id();// id nota de venta
            $table->unsignedBigInteger('administrador_id');
            $table->unsignedBigInteger('cliente_id');
            $table->float('monto');
            $table->date('fecha');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('administrador_id')->on('administradors')->references('id')->onDelete('cascade');
            $table->foreign('cliente_id')->on('clientes')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_de_ventas');
    }
}
