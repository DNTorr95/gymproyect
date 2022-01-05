<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();//id inscripcion 
            $table->unsignedBigInteger('paquete_id');
            $table->unsignedBigInteger('cliente_id');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            //$table->string('cod_qr');
            $table->float('total');

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('paquete_id')->on('paquetes')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('inscripcions');
    }
}
