<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtactetransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctactetrans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transportista_id');
            $table->date('fecha');
            $table->integer('tipocomp_id');  
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
        Schema::dropIfExists('ctactetrans');
    }
}
