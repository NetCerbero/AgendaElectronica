<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('mensaje');
            $table->date('fecha');
            $table->unsignedInteger('profesorcurso_id');
            $table->foreign('profesorcurso_id')->references('id')->on('profesor_cursos');
            $table->unsignedInteger('notificacion_id'); 
            $table->unsignedInteger('tipo_asunto');          
            $table->foreign('notificacion_id')->references('id')->on('notificacions');
            $table->foreign('tipo_asunto')->references('id')->on('tipo_asuntos');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asuntos');
    }
}
