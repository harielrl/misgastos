<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_examen');
            $table->Integer('nota');
            $table->string('presidente_mesa');
            $table->string('vocal1');
            $table->string('vocal2');
            $table->Integer('nropermiso');
            
            $table->timestamps();

            $table->unsignedInteger('idmateriaxcurso');
            $table->foreign('idmateriaxcurso')->references('id')->on('materiasxcursos');

            $table->unsignedInteger('idalumnoxcurso');
            $table->foreign('idalumnoxcurso')->references('id')->on('alumnosxcursos');
  
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
        Schema::dropIfExists('previas');
    }
}
