@extends("layouts.app2")
@section("title","Tablas de Multiplicar")

@section("content")
{{-- <meta name="csrf-token" content="{{ csrf_token() }}">
<script>window.laravel={ csrfToken: '{{ csrf_token() }}' }</script> --}}
<div class="new-class">
    <h1>Tabla de Multiplicar</h1>
</div>


<form class="form-group" method="POST" action="{{ route('doMultiplica.store') }}">

    @csrf
    <div class="form-group">
    
    <label for="">Numero</label>
    <input type="text" name="numero" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
    <my-button text="My New Text Button" type="submit"></my-button>
    {{-- <button class="my-button" text="My New Text Button"></button> --}}
 
    {{-- <button class="my-button"> ola</button> --}}
</form>

@endsection