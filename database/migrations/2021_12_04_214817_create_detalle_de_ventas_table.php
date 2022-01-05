<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDeVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_de_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nventa_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad');

            $table->timestamps();
            $table->softDeletes();
            
           /* $table->primary('nventa_id');
            $table->primary('producto_id');*/
            $table->foreign('nventa_id')->on('nota_de_ventas')->references('id')->onDelete('cascade');
            $table->foreign('producto_id')->on('productos')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_de_ventas');
    }
}
