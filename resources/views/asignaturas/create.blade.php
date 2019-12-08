@extends('layouts.app2')
@section('title','SII Registro materias')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
@endif


<form class="form-group" method="POST" action="{{ route('estudiante.store') }}" enctype="multipart/form-data">
    @csrf
    <br>
    <h1 align="center">Registrar</h1>
    <div class="form-group">
        <label for="">Numero de control </label>
        <input type="text" name="ncontrol" class="form-control @error('ncontrol') is-invalid @enderror" >
         @error('control')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
    </div>


    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror">
         @error('nombre')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
    </div>


    <div class="form-group">
        <label for="">Apellidos</label>
        <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror">
         @error('apellidos')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
   </div>


    <div>
        <label for="asignatura_clave" class="form-group">Asignatura</label>
        <select name="asignatura_clave" id="asignatura_clave" class="form-control @error('asignatura_clave') is-invalid @enderror">
            @foreach ($asignaturas as $asignatura)
                <option value="{{ $asignatura->clave }}">{{ $asignatura->materia }}</option>
            @endforeach
        </select>
        @error('asignatura')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
    </div>

    <div>
    <br>
    <button type="submit" name="add" class="btn btn-primary" value="Add">
        Guardar
    </button>

    <a href=" {{ route('estudiante.index') }}" class="btn btn-primary" align="right">
       Cancelar
    </a>
    </div>
   

    
</form>



@endsection