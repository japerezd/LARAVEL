@extends('layouts.app2')

@section('main')

<div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('estudiante.index',$asignaturas) }}" class="btn btn-default">Regresar</a>
        </div>
 <br />
        @foreach ($asignaturas as $asignatura ) 
            
            {{"<h3>". $asignatura->materia ."</h3>"}} 

        {{--    {{ "<ul>"}}
                @foreach ($asignaturas->estudiantes as $estudiante)
                {{ "<h3>". $estudiante->name ."</h3>" }}
                @endforeach
            {{"</ul>"}} --}}
        @endforeach
</div>
@endsection