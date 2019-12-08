<?php

namespace App\Http\Controllers;

use App\Calculadora;
use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mostrar una vista formulario para capturar dos numeros
        return view("operaciones.calculadora");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //nombres
        /* $add = "suma";
        $sub = "resta";
        $mul = "multiplicación";
        $div = "división"; */

        $obj=new Calculadora(); //el modelo creado 
        $obj->num1=$request->input("num1");
        $obj->num2=$request->input("num2");
        $operaciones = $request->input("operaciones");
        switch($operaciones){

            case "sumar":
                $nombre = "suma";
                $res=$obj->suma();
                return view("operaciones.resultadoCalculadora",["res"=>$res,"nombre"=>$nombre]);
                break;

            case "restar":  
            $nombre = "resta";
            $res=$obj->resta();;
            
                return view("operaciones.resultadoCalculadora",["res"=>$res,"nombre"=>$nombre]);
                break;

            case "multiplicar":
            $nombre  = "multiplicación";
            $res=$obj->multiplica();
                
               return view("operaciones.resultadoCalculadora",["res"=>$res,"nombre"=>$nombre]);
                break;

            case "dividir":
            $nombre = "división";
            $res=$obj->divide();;
              
               return view("operaciones.resultadoCalculadora",["res"=>$res,"nombre"=>$nombre]);
                break;
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
