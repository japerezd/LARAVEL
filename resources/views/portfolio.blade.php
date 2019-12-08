@extends("layouts.layout")
@section("title","Portfolio")

@section("content")
    <h1>Portfolio</h1>
    <ul>
   
            
       
    @forelse ($portfolio as $portfolioItem)
            <li>{{$portfolioItem["pe"]}} </li>
    
    @empty
        <li>No hay proyectos para mostrar </li>
    @endforelse  
    </ul>
@endsection

