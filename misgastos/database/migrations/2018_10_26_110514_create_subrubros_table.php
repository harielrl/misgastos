<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubrubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subrubros', function (Blueprint $table) {
            $table->increments('id');
			$table->string('subrubro');
			$table->integer('rubro_id')->unsigned();            
            $table->foreign('rubro_id')->references('id')->on('rubros');
            $table->boolean('condicion')->comment('1-Activado, 0-Desactivado');
            $table->integer('user_id')->unsigned();            
			$table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('subrubros');
    }
}
