<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrobancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librobancos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->date('fechadebcre');
			$table->string('concepto');
            $table->string('nrocomprobante');
            $table->float('credito',14,2);
            $table->float('debito',14,2);
            $table->float('saldocontable',14,2);
            $table->float('saldoreal',14,2);

            $table->integer('banco_id')->unsigned();            
            $table->foreign('banco_id')->references('id')->on('bancos');
            			
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
        Schema::dropIfExists('librobancos');
    }
}
