<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transportista',60);
            $table->string('domicilio',60);  
            $table->string('telefono',30);           
            $table->integer('iva_id');
            $table->integer('cuit');  
            $table->integer('localidad_id');
            $table->integer('ingbruto_id');
            $table->integer('percepcion_id');
            $table->string('mail',100);
            $table->string('saldoinicial');
            $table->string('saldo');        
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
        Schema::dropIfExists('transportistas');
    }
}
