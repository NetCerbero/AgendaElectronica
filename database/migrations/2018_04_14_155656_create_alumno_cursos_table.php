<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAlumnoCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_cursos', function (Blueprint $table) {
            //$table->increments('id');
            //$table->engine = 'MyISAM';
            $table->unsignedInteger('id');
            $table->unsignedInteger('alumno_id');
            $table->year('gestion');
            $table->unsignedInteger('curso_id');
            $table->timestamps();
            /**/            
            $table->primary(['id','alumno_id']);
            $table->foreign('alumno_id')->references('id')->on('Persona');
            $table->foreign('curso_id')->references('id')->on('cursos');            
        });
        DB::statement('ALTER TABLE alumno_cursos MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_cursos');
    }
}
