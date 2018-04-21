<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected static $bd = "cursos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'capacidad',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    public static function listaCursos(){
        return DB::table(Curso::$bd)->select('id','nombre')->get();
    }

    public function alumnosInscritos(){
        return $this->hasMany(AlumnoCurso::class,'curso_id');
    }

    public function detalleEncargado(){
        return $this->hasMany(ProfesorCurso::class,'curso_id');
    }
}
