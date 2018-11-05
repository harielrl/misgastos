<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePercepcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percepciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provincia',30);
            $table->date('finicio');
            $table->date('ffin');            
            $table->decimal('alicuota',6,2);
            $table->enum('convenio',['si','no']);
            $table->enum('empadronado',['si','no']);
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
        Schema::dropIfExists('percepciones');
    }
}
