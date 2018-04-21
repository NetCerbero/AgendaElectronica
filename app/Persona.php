<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "Persona";
    protected static $bd = "Persona";

    public function credencial(){
    	return $this->hasOne(User::class,'personaId');
    }

    public static function Add( $usr ){
    	//dd($usr);
    	DB::table("Persona")->insert($usr);
    }

    /*Relacion con la tabla AlumnoCurso*/
    public function inscritoCursos(){
    	return $this->hasMany(AlumnoCurso::class,'alumno_id');
    }

    /*Relacion con la tabla ProfesorCurso*/
    public function encargadoCursos(){
        return $this->hasMany(ProfesorCurso::class,"profesor_id");
    }


    public static function listaAlumno(){        
        return DB::table(Persona::$bd)->select('id','nombre','apellido')
                                    ->where('tipoAlumno', '=', 'v')
                                    ->get();
    }

    public static function listaProfesor(){        
        return DB::table(Persona::$bd)->select('id','nombre','apellido')
                                    ->where('tipoProfesor', '=', 'v')
                                    ->get();
    }
}
