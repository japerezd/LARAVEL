@extends('application.parent')
{{-- @extends('layouts.app') --}}
@section('title','Alumnos')
{{-- scripts --}}
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

{{-- styles --}}
{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
@section('main')
@if($errors->any())
    <div class="alert alert-danger">
            <ul>
               
                
                @foreach($errors->all as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
@endif

        @auth
        {{-- metodo onclick fue copiado de layouts/app.blade.php --}}
<li><a href="{{ route('login') }}"onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
        @endauth

<center>
    
<h1 align="center">Bienvenido al sistema

    @auth
{{-- Lo que este dentro de esta directiva solo se va a ejecutar si existe un usuario
    autenticado--}}

{{-- Accediendo al usuario autenticado, una vez que hicimos login --}}
{{ auth()->user()->name }}

@endauth
</h1>

    {{-- @guest --}}
                
        <a href="{{ route('alumnos.create') }}" align="center" class="btn btn-info">
            Registrar alumno
        </a>
    {{-- @endguest --}}
@auth
    @foreach($alumnos as $alumno)
    
            <a href="{{  route('alumnos.show',$alumno->id)}}" align="center" class="btn btn-danger">Mostrar datos</a>

    @endforeach
@endauth

</center>

@endsection

{{-- Buena practica cerrar sesion con metodo POST --}}
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf

</form>