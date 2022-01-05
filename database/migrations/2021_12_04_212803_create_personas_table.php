<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();//id persona primary
            $table->String('ci')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('url_huella')->unique()->nullable();
            $table->integer('tel')->nullable();
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->date('fecha_naci');
            $table->char('genero');
            $table->char('tipo');
            //$table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
