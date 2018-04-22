<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //

    public function alumno_curso(){
    	return $this->belongsTo(AlumnoCurso::class,'alumno_id');
    }

    public function profesor_curso(){
    	return $this->belongsTo(ProfesorCurso::class,'profesor_curso');
    }
}
