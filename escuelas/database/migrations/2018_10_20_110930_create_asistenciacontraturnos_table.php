<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciacontraturnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistenciacontraturnos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->enum('asistencia',[P,A,T,SC,SP,F]);
            $table->timestamps();

            $table->unsignedInteger('idalumnoxcurso');
            $table->foreign('idalumnoxcurso')->references('id')->on('alumnosxcursos');

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
        Schema::dropIfExists('asistenciacontraturnos');
    }
}
