<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function telefono(){
        //Se usa el modelo telefono, ya que hacia esa nos relacionaremos
        //segundo parámetro es el foreign key de la tabla que nos relacionaremos
        return $this->hasOne('App\Telefono',"alumno_id"); //<--Nombre del modelo
    }

    protected $fillable = ["nombre","apellidos"];
}
