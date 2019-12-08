<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    //
    public function alumno(){
        return $this->belongsTo('App\Student'); //<--Nombre del modelo
    }

protected $fillable = ["alumno_id","telefono"];
}
