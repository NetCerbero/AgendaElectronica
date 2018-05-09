<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('mensaje');
            $table->char('estado',1);
            $table->tinyInteger('pertenece'); // 1 = profesor, 2 = alumno, 3 = grupo
            $table->unsignedInteger('profesor_curso')->nullable();
            $table->Integer('alumnocurso_id')->nullable();
            $table->unsignedInteger('alumno_id')->nullable();
            $table->unsignedInteger('curso_id')->nullable();
            $table->foreign('profesor_curso')->references('id')->on('profesor_cursos');
            $table->foreign('alumnocurso_id')->references('id')->on('alumno_cursos');
            $table->foreign('alumno_id')->references('alumno_id')->on('alumno_cursos');
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
        Schema::dropIfExists('mensajes');
    }
}
