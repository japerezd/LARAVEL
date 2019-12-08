@extends('layouts.app2')
@section('title','SII')

@section('content')
 <center>
    <h1>REGISTRE UNA ASIGNATURA</h1>
    <a href="{{ route('estudiante.create') }}" align="center" class="btn btn-info">
            Registrar materia
    </a>

    {{-- <a href="asignaturas/view" align="center" class="btn btn-info">
                Ver alumnos
        </a> --}}
<center>
@endsection