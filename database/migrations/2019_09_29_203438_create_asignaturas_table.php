<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('clave',7)->index()->primary();
           // $table->string('estudiante_ncontrol',9)->nullable()->index();
            $table->string('materia');
            $table->string('creditos');
            $table->timestamps();
    
          //  $table->foreign('estudiante_id')->references('ncontrol')->on('estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
}
