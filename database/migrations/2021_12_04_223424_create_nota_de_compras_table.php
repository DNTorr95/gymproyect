<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaDeComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_de_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrador_id');
            $table->unsignedBigInteger('empresa_id');
            $table->float('total');
            $table->date('fecha');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('administrador_id')->on('administradors')->references('id')->onDelete('cascade');
            $table->foreign('empresa_id')->on('empresas')->references('id')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_de_compras');
    }
}
