<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dni');
            $table->string('apellido');
            $table->string('nombres');
            $table->string('mail');
            $table->timestamps();

            $table->unsignedInteger('idtutor');
            $table->foreign('idtutor')->references('id')->on('tutores');

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
        Schema::dropIfExists('alumnos');
    }
}
