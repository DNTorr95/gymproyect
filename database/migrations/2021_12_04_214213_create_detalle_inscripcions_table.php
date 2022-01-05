<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inscripcions', function (Blueprint $table) {
            $table->id(); //id detalle inscripcion
            //$table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->unsignedBigInteger('inscripcion_id');
            $table->float('precio');
            $table->timestamps();
            $table->softDeletes();


            //$table->foreign('instructor_id')->on('instructors')->references('id');
            $table->foreign('inscripcion_id')->on('inscripcions')->references('id')->onDelete('cascade');
            $table->foreign('grupo_id')->on('grupos')->references('id')->onDelete('cascade');
            $table->foreign('disciplina_id')->on('disciplinas')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_inscripcions');
    }
}
