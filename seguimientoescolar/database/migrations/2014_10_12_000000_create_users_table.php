<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institucion')->comment('Nombre de la Escuela');
            $table->string('direccion')->comment('Domicilio de la Escuela');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('telefono')->comment('Números de Telefono/celular de la Escuela');
            $table->string('mail');
            $table->string('foto');
            $table->string('director')->comment('Responsable de la Escuela');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('rol',[administrador,director,vicedirector,regente,secretaria,auxiliar_sec,celador,acesora_ped,tutor_curso,docente,alumno,tutor_alumno]);
           
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('idrol')->default(1);
            $table->foreign('idrol')->references('id')->on('roles');

            $table->unsignedInteger('idescuela')->default(1);
            $table->foreign('idescuela')->references('id')->on('escuelas');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escuelas');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
    }
}
