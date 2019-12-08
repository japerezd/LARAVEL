<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    //
    public function Hola($name){
        return "Hola ". $name." ¿Cómo estas? ";
    }

    public function add($a,$b){
        return "Add is ". ($a+$b);
    }

    public function create(){
        return view("trainers.create"); //nombreCarpeta.nombreVistaBlade
    }
}
