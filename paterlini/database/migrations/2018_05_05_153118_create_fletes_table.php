<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fletes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');            
            $table->integer('transportista_id');
            $table->enum('facturadotra',['si','no']);
            $table->integer('chofer_id');
            $table->integer('camion_id');
            $table->integer('cliente_id');
            $table->enum('facturadocli',['si','no']);
            $table->integer('producto_id');
            $table->string('cartaporte',30);
            $table->decimal('kilos',12,0);
            $table->integer('kms_id');
            $table->decimal('tarifa',12,2);
            $table->decimal('importe',12,2);            
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
        Schema::dropIfExists('fletes');
    }
}
