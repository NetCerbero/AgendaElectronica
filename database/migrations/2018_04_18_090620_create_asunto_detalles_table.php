<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsuntoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asunto_detalles', function (Blueprint $table) {
            $table->unsignedInteger('asunto_id');
            $table->Integer('alumnocurso_id');
            $table->unsignedInteger('alumno_id');   
            $table->char('estado',1);
            $table->primary(['asunto_id','alumnocurso_id','alumno_id']);
            $table->foreign('asunto_id')->references('id')->on('asuntos');
            $table->foreign('alumnocurso_id')->references('id')->on('alumno_cursos');
            $table->foreign('alumno_id')->references('alumno_id')->on('alumno_cursos');            
        });
       // DB::statement('FOREIGN KEY (alumnocurso_id) REFERENCES alumno_cursos(id)');       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asunto_detalles');
    }
}
