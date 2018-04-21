<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAsunto extends Model
{
    
   public $timestamps = false;

   public function asunto(){
   	 return $this->hasOne(Asunto::class);
   }
}
