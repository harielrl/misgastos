<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosxcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnosxcursos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('idalumno');
            $table->foreign('idalumno')->references('id')->on('alumnos');

            $table->unsignedInteger('idcurso');
            $table->foreign('idcurso')->references('id')->on('cursos');

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
        Schema::dropIfExists('alumnosxcursos');
    }
}
