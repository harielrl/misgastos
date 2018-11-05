<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->longtext('perfil');
            $table->longtext('alcances');
            $table->longtext('capacidades');
            $table->longtext('formas_evidencias');
            $table->longtext('evidencias');
            $table->longtext('actividades_formativas');
            $table->longtext('contenidos_generales');
            $table->longtext('contenidos_especificos');
            $table->longtext('entorno_aprendizaje');
            $table->timestamps();

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
        Schema::dropIfExists('planificaciones');
    }
}
