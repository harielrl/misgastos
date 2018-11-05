<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('camion',60);
            $table->string('patchasis',10);  
            $table->date('fverifchasis');
            $table->string('patacoplado',10);  
            $table->date('fverifacop');
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
        Schema::dropIfExists('camiones');
    }
}
