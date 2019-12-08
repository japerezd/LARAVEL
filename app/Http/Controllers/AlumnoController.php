<?php

namespace App\Http\Controllers;
use App\Alumno;
use Illuminate\Http\Request;
use App\Events\NewStudentHasRegisteredEvent;

class AlumnoController extends Controller
{

     public function __construct()
    {
        //$this->middleware('auth')->only("index","create");
        $this->middleware('test')->only("index");
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $data = Alumno::latest();
        return view('alumnos.index',compact("data")); */
        
        return view("alumnos.index", [
            //alumnos    es el nombre de la tabla
            "alumnos" => Alumno::paginate(5)  //este objeto lo manda hacia la vista portfolio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(([
            'control'               => 'required',
            'nombre'                => 'required',
            'apellidos'              => 'required',
            'email'                 => 'required|email',
            'celular'               => 'required|min:10|max:10',
            'foto'                  => 'required|image|max:2048',
            'genero'                => 'required',
        ]));


        
        $imagen= $request->file('foto');
        $new_name=rand().'.'.$imagen->
                getClientOriginalExtension();
        $imagen->move(public_path('fotografias'),$new_name);
        $datos=array(
                'control'               => $request->control,
                'nombre'                => $request->nombre,
                'apellidos'              => $request->apellidos,
                'email'                 => $request->email,
                'celular'               => $request->celular,
                'foto'                  => $new_name,
                'genero'                => $request->genero
        );

        Alumno::create($datos);
       
        $datosEnviar = new Alumno();
        $datosEnviar->control=$request->control;
        $datosEnviar->nombre=$request->nombre;
        $datosEnviar->apellidos=$request->apellidos;
        $datosEnviar->email=$request->email;
        $datosEnviar->celular=$request->celular;
        $datosEnviar->foto=$new_name;
        $datosEnviar->genero=$request->genero;
    
        //en este evento tiene 3 listeners que se encuentran en EventServiceProvider
        event(new NewStudentHasRegisteredEvent($datosEnviar)); 
        //Registrando newsletter
      //  dump("Registered to newsletter");

        //notificacion a admin
        //dump('Mensaje aqui');
//Para que haya conexion entre evento y listener hay que agregarlos en providers.EventServiceProvider.php

       //return view('alumnos.confirmarDatos',['datos'=>$datosEnviar]);
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

        $data = Alumno::findOrFail($id); //encuentr el id y regresa la vista de abajo, sino lo encuentra manda un error
        return view("alumnos.view",compact("data"));
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
