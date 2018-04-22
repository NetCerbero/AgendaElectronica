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
            $table->unsignedInteger('profesor_curso');
            //$table->Integer('alumno_curso');
            $table->unsignedInteger('alumno_id');
            $table->foreign('profesor_curso')->references('id')->on('profesor_cursos');
            $table->foreign('alumno_id')->references('alumno_id')->on('alumno_cursos');
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
