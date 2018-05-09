<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $fillable = ['direccion','nombre','id_asunto'];

    public function asunto(){
    	return $this->belongsTo(Asunto::class,'id_asunto');
    }
}
