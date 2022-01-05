<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();//id bitacora
            $table->unsignedBigInteger('administrador_id');
           
            $table->string('accion');
            $table->dateTime('f_entrada');
            $table->dateTime('f_salida');
    
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('administrador_id')->on('administradors')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
}
