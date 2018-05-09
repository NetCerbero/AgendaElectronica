<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = "mensajes";
    protected $fillable = ['mensaje','estado','profesor_curso','alumnocurso_id','alumno_id','curso_id','pertenece'];

    public function alumno_curso(){
    	return $this->belongsTo(AlumnoCurso::class,'alumnocurso_id');
    }

    public function profesor_curso(){
    	return $this->belongsTo(ProfesorCurso::class,'profesor_curso');
    }

    public function curso(){
    	return $this->belongsTo(Cursos::class, 'curso_id');
    }
}
