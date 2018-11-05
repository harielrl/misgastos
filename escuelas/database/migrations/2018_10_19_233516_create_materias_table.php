<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('ciclo',[Básico,Superior);
            $table->enum('campo_formacion',[General,Científico Tecnológica,Técnica Específica,Prácticas Profesionalizantes);
            $table->string('espacio_curricular');
            $table->decimal('horasxsemana',2,0);
            $table->timestamps();
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
        Schema::dropIfExists('materias');
    }
}
