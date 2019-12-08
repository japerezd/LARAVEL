<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MessagesController extends Controller
{
    //

    public function store(){
        //metodo validate nos regresa automaticamente a la pagina del formulario
        request()->validate([
            'name'=>'required',//este name es del campo de contact
            'email'=>'required|email' , //debe ser requerido y tipo email
            'subject'=>'required',
            'content'=>'required|min:3' //minimo usar 3 caracteres
        ]);

        //Enviando el email
        Mail::to("jorge_alberto1997@hotmail.com")->send(new MailableClass);
        return "Datos validados";
    }
}
