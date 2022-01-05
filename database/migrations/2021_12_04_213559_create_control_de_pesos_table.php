<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlDePesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_de_pesos', function (Blueprint $table) {
            $table->id();//id control de peso
            $table->unsignedBigInteger('cliente_id');
            
            $table->float('altura');
            $table->float('peso');
            $table->float('imc');
            $table->date('fecha');
            
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('control_de_pesos');
    }
}
