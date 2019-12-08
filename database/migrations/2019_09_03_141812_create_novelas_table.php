<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Creacion de tablas en la bd que configuramos
    public function up()
    {
        Schema::create('novelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string("titulo",100); //titulo con tamaño 100
            $table->string("protagonista",100); //string de tamaño 100
            $table->string("director",100);
            $table->integer("anio");
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //Elimina tablas en la bd que configuramos
    public function down()
    {
        Schema::dropIfExists('novelas');
    }
}
