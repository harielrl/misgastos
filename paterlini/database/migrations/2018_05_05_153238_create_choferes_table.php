<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chofer',60);
            $table->string('domicilio',60);  
            $table->string('telefono',30);           
            $table->integer('iva_id');
            $table->integer('cuit');  
            $table->integer('localidad_id');
            $table->date('fvtocarnet');
            $table->string('mail',100);
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
        Schema::dropIfExists('choferes');
    }
}
