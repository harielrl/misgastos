<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellido_tutor');
            $table->string('nombres_tutor');
            $table->string('mail');
            $table->string('celular');
            $table->string('teltrabajo');
            $table->string('direccion');
            $table->string('ocupacion');
            $table->longtext('historialmedico');
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
        Schema::dropIfExists('tutores');
    }
}
