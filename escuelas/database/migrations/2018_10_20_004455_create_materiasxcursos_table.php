<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasxcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiasxcursos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('idmateria');
            $table->foreign('idmateria')->references('id')->on('materias');

            $table->unsignedInteger('idcurso');
            $table->foreign('idcurso')->references('id')->on('cursos');

            $table->unsignedInteger('idusuarioxescuela');
            $table->foreign('idusuarioxescuela')->references('id')->on('usuarioxescuelas');

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
        Schema::dropIfExists('materiasxcursos');
    }
}
