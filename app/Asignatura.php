<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    //
    protected $guarded = [];

    public function estudiantes()
    {
       // return $this->belongsTo(Estudiante::class);
       return $this->hasMany(Estudiante::class,'asignatura_clave');
    }
}
