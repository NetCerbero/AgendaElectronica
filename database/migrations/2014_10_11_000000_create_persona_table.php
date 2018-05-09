<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->char('tipoAlumno',1);
            $table->char('tipoProfesor',1);
            $table->char('tipoPadre',1);
            $table->date('fechaNacimiento');
            $table->text('token_firebase')->nullable();//guardara el token de firebase
            $table->bigInteger('telefono')->nullable();            
            $table->bigInteger('ci')->nullable();
            $table->string('direccion')->nullable();
            $table->unsignedInteger('hijoDe')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE Persona ADD FOREIGN KEY (hijoDe) REFERENCES Persona(id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Persona');
    }
}
