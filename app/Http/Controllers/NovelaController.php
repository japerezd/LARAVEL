<?php
//https://www.youtube.com/watch?v=B1rSH_Pay2c --> validacion
namespace App\Http\Controllers;

use App\Company;
use App\Novelas;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionesRequest;
use App\Telefono;
use App\Student;

class NovelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //relacion 1 a 1
        $phone = new Telefono();
        $student = new Student();

        $student->nombre="Jorge Alberto";
        $student->apellidos="Pérez Diaz";

        $phone->telefono="2291290792";
        $student->save();
        $student->find(1); //recuperando el id
        //para guardar el telefono de estudiante, ese telefono() se creo en modelo Student
        $student->telefono()->save($phone);
        //buscando por id de estudiante el telefono que tenemos en la funcion telefono()
        $myPhone = Student::find(1)->telefono;//buscando el primer registro del telefono en nuestra tabla

        echo $myPhone;
        echo"<br>";

        //relacion 1 a 1 inversa
        $celular = new Telefono();
        $celular->telefono="2291290792";

        $estudiante = Student::find(1); //se busca el id en estudiante

        $celular->alumno()->associate($estudiante);

        $celular->save();


        $estudiante->telefono()->create([
                'telefono'=>'2292346590',
        ]);
        //
        /* $miNovela = new Novelas();
        $miNovela->titulo="Cafe con aroma de mujer";
        $miNovela->protagonista="Juan Querendon";
        $miNovela->director="Enrique Segoviano";
        $miNovela->anio=1997;
        //Para laravel los atributos son las columnas de las tablas
        echo "$miNovela";
        $miNovela->save(); */ //Mandalo a la base de datos

        //---COMPAÑIAS
        //$myCompany = Company::find(1)->customer;
        echo "<br>";
        $companies = Company::all(); 
        foreach ($companies as $company ) {
            echo "<h3>". $company->name ."</h3>";
            echo "<h3>". $company->phone ."</h3>";
            
            foreach ($company->customers as $customer) {
                echo"<li>". $customer->name." ". $customer->email."</li>";
            }
           
        }
        return "Estas en el index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view("modelos.novelas");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionesRequest $request)
    {
        //
        $miNovela=new Novelas();
        $miNovela->titulo = $request->input("title");
        $miNovela->protagonista = $request->input("protagonista");
        $miNovela->director = $request->input("dir");
        $miNovela->anio = $request->input("year");

        /* request()->validate([
            //"title"=>"required|unique:posts|max:255" unique = no se repiten en tabla posts (novelas)
            "title"=> "required",
            "protagonista"=> "required",
            "dir"=> "required",
            "year"=> "required|min:4"
        ]); */
        //$miNovela->save();
        $validate = $request->validated();
        return view("modelos.novelasSend",["envio"=>$miNovela->save()]);
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
