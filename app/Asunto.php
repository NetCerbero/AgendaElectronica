<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Asunto extends Model
{
	protected static $bd = "asuntos";
	public $timestamps = false;
	protected $fillable = ["titulo","mensaje","fecha","profesorcurso_id","notificacion_id","tipo_asunto"];
    /*public static function Add($newAgenda){
    	DB::table(Asunto::$bd)->insert($newAgenda);
    }*/

    public function tipoAsunto(){
    	
    	return $this->belongsTo(TipoAsunto::class,'tipo_asunto');
    }

    public function contenido(){
        return $this->hasMany(Contenido::class,'id_asunto');
    }

    public function detalleAsunto(){
        return $this->belongsToMany(AlumnoCurso::class,'asunto_detalles','id','id');   
    }
    
}
