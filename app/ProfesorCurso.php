<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class ProfesorCurso extends Model
{
	protected static $bd = "profesor_cursos";
    protected $fillable = [
        'profesor_id', 'curso_id','gestion','tipo'
    ];


    public function profesor(){
    	return $this->belongsTo(Persona::class,"profesor_id");
    }

    public function cursos(){
    	return $this->belongsTo(Curso::class,'curso_id');
    }

    public function CursoTutor($idProfesor){
        return $this->cursos();
    }

    public function mensaje(){
        return $this->hasMany(Mensaje::class,'profesor_curso');
    }
}
