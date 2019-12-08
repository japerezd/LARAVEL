<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.laravel={ csrfToken: '{{ csrf_token() }}' }</script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Scripts | Defer es par que se ejecute al final de la carga--}}
    <script src=" {{ asset('js/app.js') }}" defer></script>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Mi Aplicacion - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <a href="#" class="navbar-brand">Mi Modelo</a>
</nav>

<div id="app2">

    <div class="container">
        @yield("content")
    </div>
</div>
    
        


</body>
</html>

{{--  asdasdasdasdasdsadasdasd --}}

