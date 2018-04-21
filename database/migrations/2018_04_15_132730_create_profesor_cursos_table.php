<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesor_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tipo',1);//oficial o auxiliar
            $table->year('gestion');
            $table->unsignedInteger('profesor_id');
            $table->unsignedInteger('curso_id');
            $table->foreign('profesor_id')->references('id')->on('Persona');
            $table->foreign('curso_id')->references('id')->on('cursos');
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
        Schema::dropIfExists('profesor_cursos');
    }
}
