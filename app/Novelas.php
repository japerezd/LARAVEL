<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novelas extends Model
{
    //
    protected $table = "novelas";
    public $timestamps = false;
    //Estos son atributos por default
    protected $attributes = [
        "protagonista"=> "Keanu Reeves"
    ];





    /* public function getRouteKeyName()
    {
        return "year";
    } */

}
