<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDeComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_de_compras', function (Blueprint $table) {
            $table->id();// id detalle de compra
            $table->unsignedBigInteger('ncompra_id');
            $table->unsignedBigInteger('maquinaria_id');
            $table->integer('cantidad');
            $table->float('precio');
            $table->boolean('garantia');
            $table->date('duracion');

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ncompra_id')->on('nota_de_compras')->references('id')->onDelete('cascade');
            $table->foreign('maquinaria_id')->on('maquinarias')->references('id')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_de_compras');
    }
}
