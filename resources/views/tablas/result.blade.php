@extends("layouts.app2")
@section("title","Tablas de Multiplicar")

@section("content")
    <h1>Tabla de Multiplicar</h1>
    <!--$num es para store de MultiplicaController-->
    <h2> Tabla del {{ $num }} </h2>
    
     @for($i=1;$i<=10;$i++)
        <h3>{{$num." x ".$i." = ".$num*$i}}</h3>
    @endfor 
    
@endsection