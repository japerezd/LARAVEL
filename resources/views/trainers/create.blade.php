@extends("layouts.app2") <!--nombreCarpeta.nombreBlade-->
@section("title","Entrenador")

@section("content")
 <h1>Hola desde create view</h1>

 <form class="form-group" method="POST" action="/LARAVEL/public/trainers">
 
    @csrf
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
  
 </form>

 @endsection  