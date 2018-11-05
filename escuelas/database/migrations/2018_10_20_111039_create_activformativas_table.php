<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivformativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activformativas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('titulo');
            $table->longtext('detalle');
            $table->string('duracion');
            $table->timestamps();
            
            $table->unsignedInteger('idtrabajo');
            $table->foreign('idtrabajo')->references('id')->on('trabajos');

            $table->unsignedInteger('idmateriaxcurso');
            $table->foreign('idmateriaxcurso')->references('id')->on('materiasxcursos');

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
        Schema::dropIfExists('activformativas');
    }
}
