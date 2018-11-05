<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('trimestre1');
            $table->Integer('trimestre2');
            $table->Integer('trimestre3');
            $table->Integer('recuperatorio1');
            $table->Integer('recuperatorio2');
            $table->Integer('notadic');
            $table->Integer('recuperatorio3');
            $table->Integer('recuperatorio4');
            $table->Integer('notafinal');
            $table->Integer('division');
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
        Schema::dropIfExists('notas');
    }
}
