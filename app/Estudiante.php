<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
    protected $guarded = [];

    public function asignaturas(){
        //return $this->hasMany(Asignatura::class); //estudiante_id <- llave foranea
        return $this->belongsTo(Asignatura::class);
    }
}
