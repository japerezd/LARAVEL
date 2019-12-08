<?php

use App\Asignatura;
use App\Estudiante;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); 

*/
 Route::get('/', function () {
    return view('auth.login');
}); 

Route::get('/welcome', function () {
    return "Bienvenido a Laravel";
});


Route::get('/test', function () {
    return "Página de prueba";
});

Route::get('foo', function () {
    return "Hello World!";
});

Route::get('nombre/{name}/{lastname}', function ($name, $lastname) {
    return "Mi nombre es ". $name. " y mi apellido es " .$lastname;
});

Route::get('/suma/{v1}/{v2}', function($v1,$v2){

    // $v3 = $v1 + $v2;
    return "The addition of ".$v1 ."+". $v2. " is ".($v1+$v2);
});

Route::get('/escuela/carrera/departamento',function(){

    return "Ingeniería en sistemas computacionales";
 
})->name('itvsis');


//Haciendo una redireccion
Route::get('/test', function(){
    return redirect()->route('itvsis');
});
/////////////////////////////////////////////////////////////////////////////////
/* Route::get("contactame",function(){ //ejemplo 
    return "Seccion de contactos";
})->name("contactos"); 

//redireccionando ejemplo contactos
Route::get("/",function(){
    echo "<a href=". route('contactos').">Contactos 1</a> <br>";
    echo "<a href=". route('contactos').">Contactos 2</a> <br>";
    echo "<a href=". route('contactos').">Contactos 3</a> <br>";
    echo "<a href=". route('contactos').">Contactos 4</a> <br>";
    echo "<a href=". route('contactos').">Contactos 5</a> <br>";
   
    
}); */

/* Route::get("/",function(){
    $nombre = "Jorge";
    return view("home")->with(["nombre"=>$nombre]); //nombreVariable, valor
})->name("home"); */

//Route::view("/","home")->name("home"); descomentar para que funcione sin el login
Route::view("/about","about")->name("about");
//Route::view("/portfolio","portfolio",compact("portfolio"))->name("portfolio");
// Route::get("/portfolio","PortfolioController@index")->name("portfolio");
Route::resource("portfolio","PortfolioController");

Route::view("contact","contact")->name("contact");
//se crea esta ruta para responder al metodo post que tiene contact
Route::post("contact","MessagesController@store")->name("ContactPost");

//Route::view("/","home")->("home"); //cuando vaya a la raiz, me mande a home.blade.php
/////////////////////////////////////////////////////////////////////////////////

//Llamando al controlador
//nombreControlador@nombremetodo
/* Route::get('/inicio/{id}','Ejemplo3Controller@index');

Route::get('/saludo/{name}','HolaController@Hola');
Route::get('/sumale/{a}/{b}','HolaController@add');

Route::get('/','PaginasController@inicio');
Route::get('/inicio','PaginasController@inicio');
Route::get('/quienesSomos','PaginasController@quienesSomos');
Route::get('/dondeEstamos','PaginasController@dondeEstamos');
Route::get('/foro','PaginasController@foro'); */


//Comando utilizado php artisan route:list
Route::resource("posts","Ejemplo3Controller");//accediendo al posts en Ejemplo3Controller


Route::get("/create","HolaController@create");

Route::get("/bienvenida","WelcomeController@msgWelcome");

Route::resource("doMultiplica","MultiplicaController"); 
//Route::get("vue/create","MultiplicaController@create")->name("vue.create");

Route::resource("operacion","OperacionesController");

Route::resource("calculadora","CalculadoraController");

    Route::resource('novelas', 'NovelaController');
 Route::get("novelas","NovelaController@index")
->name("novelas.index");

/*  Route::group(["middleware"=>["webApp"]],function(){

    Route::get("novelas","NovelaController@index")
    ->name("novelas.index"); 

    Route::get("/welcome",function(){
        return view ("welcome");
    });
});  */
Route::resource('crud', 'CrudController');


Route::resource('alumnos','AlumnoController');
Route::get('alumnos/create','AlumnoController@create')->name('alumnos.create');
Route::get('alumnos','AlumnoController@index')->name('alumnos.index')->middleware('idApp');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('materias',function ()
{
     
   $estudiante = new \App\Estudiante();
   // $estudiante = Estudiante::all();
    $estudiante->ncontrol="E15020609";
    $estudiante->nombre="Jorge Alberto";
    $estudiante->apellidos="Perez Diaz";

   $estudiante2 = new \App\Estudiante();
    //$estudiante2 = Estudiante::all();
    $estudiante2->ncontrol="E15020608";
    $estudiante2->nombre="Juan";
    $estudiante2->apellidos="Talamera";

    $materia1 = new \App\Asignatura();
   // $materia1 = Asignatura::all();
    $materia1->clave="AEF0290";
    $materia1->materia="Arquitectura Web";
    $materia1->creditos="5";

    $materia2 = new \App\Asignatura();
   // $materia2 = Asignatura::all();
    $materia2->clave="ASD0296";
    $materia2->materia="Sistemas distribuidos";
    $materia2->creditos="6";
try{
   // $estudiante=\App\Estudiante::first();
   // $estudiante->save();
    $estudiante->asignaturas()->save($materia2);
}catch(\Illuminate\Database\QueryException $ex){
    dd($ex->getMessage());
}
    return "You are here<br>";
});

Route::resource('estudiante','EstudianteController');