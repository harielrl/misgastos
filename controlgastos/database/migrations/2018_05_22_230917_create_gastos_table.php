<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id');
            $table->date('fecha');
            $table->enum('tipocomp',['Fac','Deb','Cre','Rec']);  
            $table->enum('condvta',['contado','cta_cte']);           
            $table->string('detalle',100);
            $table->decimal('debe',12,2);  
            $table->decimal('haber',12,2);   
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
        Schema::dropIfExists('gastos');
    }
}
