<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
			$table->date('fecha');
			$table->string('detalle');
            $table->enum('tipo_mov',['ingreso','egreso']);
            $table->float('ingreso',14,2);
            $table->float('egreso',14,2);
            $table->float('saldo',14,2);
			$table->integer('subrubro_id')->unsigned();            
            $table->foreign('subrubro_id')->references('id')->on('subrubros');
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
        Schema::dropIfExists('movimientos');
    }
}
