<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Crud;

class CrudController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Crud::latest()->paginate(5);
        return view("crud.index", compact("data"))
            ->with("i", (request()->input("page", 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("crud.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validando el formulario
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "image" => "required|image|max:2048",  //Debe ser imagen con un maximo de 2 MB
        ]);
        //Tenemos la propiedad de imagen seleccionada con la variable $image
        $image = $request->file("image");
        //Ahora queremos generar un nuevo nombre de la imagen
        $new_name = rand() . "." . $image->getClientOriginalExtension();
        //El metodo getClientOriginalExtension nos regresará la extension original de la imagen

        //Para subir la imagen :
        //Este metodo en pocas palabras subira la imagen al folder images que esta dentro de public
        $image->move(public_path("images"), $new_name); //metodo move() movera la imagen a una nueva ubicacion 
        //el metodo public_path regresará el folder public y despues el nombre de la carpeta de los archivos

        //Despues de subida la imagen, tenemos que moverlo para insertarlo en nuestra tabla de SQL
        $form_data = array(
            //con first_name obtenemos el valor con $request->first_name objeto
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "image" => $new_name
        );
        //Este método insertará con la variable $form_data datos en la tabla de sample_data
        //Lo guardara en la base de datos
        Crud::create($form_data);

        return redirect("crud")->with("success","Datos ingresados exitosamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //este metodo regresará nos regresará el modelo basado en su primary key
        $data = Crud::findOrFail($id); //encuentr el id y regresa la vista de abajo, sino lo encuentra manda un error
        return view("crud.view",compact("data")); //ya podemos usar la variable data en crud.view
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
        $data = Crud::findOrFail($id); //Este metodo nos regresará el modelo basado en su id
        return view("crud.edit",compact("data"));
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
        $image_name = $request->hidden_image; //nombre de la imagen
        $image = $request->file("image"); //el archivo imagen
        //Esta condicion nos verifica si hay valor o no en la variable $image
        if($image != ""){
            $request->validate([
                "first_name" => "required",
                "last_name" => "required",
                "image" => "image|max:2048",
            ]);
            //Generando el nuevo nombre de la imagen
            $image_name = rand().".".$image->getClientOriginalExtension(); //metodo nos regresará la extension original de la imagen
            //Subiendo la imagen
            $image ->move(public_path("images"),$image_name);
        }else{
            //Solo validando los campos de nombre y apellido
            $request->validate([
                "first_name" => "required",
                "last_name" => "required"
            ]);
        }
        //Tenemos que mover lo que actualizamos hacia nuestra tabla de SQL
        $form_data = array(
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "image" => $image_name,
        );

        Crud::whereId($id)->update($form_data); 
        //este método (whereId ) añadira una clausula where en la consulta de update para encontrar el id
        //metodo update actualizará los datos en la bd

        //redireccionando al index de CrudController
        return redirect("crud")->with("success","Datos actualizados exitosamente");

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
        $data = Crud::findOrFail($id); //busca el id y lo encuentra
        $data->delete(); //borrara los datos de la base de datos
        return redirect("crud")->with("success","Datos eliminados exitosamente");
    }
}
