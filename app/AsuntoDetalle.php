<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsuntoDetalle extends Model
{
    public $timestamps = false;
    protected $fillable = ["asunto_id","alumnocurso_id","alumno_id","estado"];
}
