<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();//id disciplina
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('paquete_id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->float('precio');
            $table->timestamps();
            $table->softDeletes(); 
            $table->foreign('area_id')->on('areas')->references('id')->onDelete('cascade');
            $table->foreign('paquete_id')->on('paquetes')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}
