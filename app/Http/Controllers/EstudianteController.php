<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    //
    public function index()
    {
        /*  echo "<br>";
        $asignaturas = Asignatura::all(); 
        foreach ($asignaturas as $asignatura ) {
            echo "<h4>". $asignatura->materia," Clave: ", $asignatura->clave," Creditos: ",$asignatura->creditos ."</h4>";
            foreach ($asignatura->estudiantes as $estudiante) {
                echo"<li>". $estudiante->nombre." ".$estudiante->apellidos."</li>";
            }
        }  */
        return view('asignaturas.index'); 
    }

    public function create()
    {
        $asignaturas = Asignatura::all();
        return view('asignaturas.create',compact('asignaturas'));
    }

    public function store(Request $request)
    {
        $data= request()->validate([
            'ncontrol' => 'required|min:9|max:9',
            'nombre'=> 'required|min:3',
            'apellidos'=> 'required|min:3', 
            'asignatura_clave'=> 'required',
        ]);

        Estudiante::create($data);
        return redirect()->route("estudiante.index")->with("status","La asignatura fue agregada exitosamente.");
       // return redirect("crud")->with("success","Datos ingresados exitosamente.");
    }

    public function show(Estudiante $estudiante, Asignatura $asignatura)
    {
         //este metodo regresará nos regresará el modelo basado en su primary key
         //$data = Estudiante::findOrFail($id); //encuentr el id y regresa la vista de abajo, sino lo encuentra manda un error
         //return view("crud.view",compact("data")); //ya podemos usar la variable data en crud.view

         return view("asignatura.view",[
             "estudiantes"=> $estudiante,
             "asignaturas"=> $asignatura
         ]);
    }
}
