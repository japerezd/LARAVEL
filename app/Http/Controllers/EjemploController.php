<?php

namespace App\Http\Controllers;


class EjemploController extends Controller   //hereda del controlador principal
{
    /*Metodos que van en este controlador */


    //Gestionar rutas con controladores

    public function inicio(){
        return "Estas en el inicio del sitio";
    }
}
