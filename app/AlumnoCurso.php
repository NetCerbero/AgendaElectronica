<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoCurso extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['alumno_id','gestion','curso_id'];

    /*Relacion con Persona ALumno"*/
    public function alumno(){
    	return $this->belongsTo(Persona::class,'alumno_id');
    }

    public function curso(){
    	return $this->belongsTo(Curso::class,'curso_id');
    }

    public function mensaje(){
    	return $this->hasMany(Mensaje::class,'alumnocurso_id');
    }

    public function detalleAsunto(){
        return $this->hasMany(Asunto::class,'id');
    }
}
