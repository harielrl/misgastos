<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente',60);
            $table->string('domicilio',60);  
            $table->string('telefono',30);           
            $table->enum('iva',['Cons.Final','Exento','Resp.Monotributo','Resp.Inscripto']);
            $table->string('cuit',11);  
            $table->string('localidad',30);            
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
        Schema::dropIfExists('clientes');
    }
}
