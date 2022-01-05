<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();//id grupo
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->string('nombre');
            $table->string('dia_sem');
            $table->time('hra_ini');
            $table->time('hra_fin');
            $table->integer('cupo');

            $table->timestamps();
            $table->softDeletes();
            //$table->primary('disciplina_id');
            $table->foreign('instructor_id')->on('instructors')->references('id')
            ->onDelete('cascade');
            $table->foreign('disciplina_id')->on('disciplinas')->references('id')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
