<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('titulo');
            $table->longtext('detalle');
            $table->timestamps();

            $table->unsignedInteger('idmateriaxcurso');
            $table->foreign('idmateriaxcurso')->references('id')->on('materiasxcursos');

            $table->unsignedInteger('idciclolectivo');
            $table->foreign('idciclolectivo')->references('id')->on('ciclolectivos');

            $table->unsignedInteger('idescuela');
            $table->foreign('idescuela')->references('id')->on('escuelas');
            
            $table->unsignedInteger('idusuario');
            $table->foreign('idusuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
}
