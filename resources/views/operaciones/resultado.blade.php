@extends("layouts.app2")
@section("title","Operacion")

@section("content")
 
    <h1>{{$nombre}}</h1>

    <h3>{{"Resultado de la ". $nombre." = " .$res}}</h3>
@endsection
