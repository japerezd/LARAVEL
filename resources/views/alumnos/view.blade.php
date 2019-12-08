@extends('application.parent')

@section('main')

<div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('alumnos.index') }}" class="btn btn-default">Regresar</a>
        </div>
 <br />
 {{--Se esta desplegando la imagen  --}}
 <img src="{{ URL::to('/') }}/fotografias/{{ $data->foto }}" class="img-thumbnail" />
 {{-- nombre - $data-first_name. Con esto despliega el nombre y apellido correspondiente --}}
 <h3>Número de control - {{ $data->control }} </h3>
 <h3>Nombre(s) - {{ $data->nombre }}</h3>
 <h3>Apellido(s) - {{ $data->apellidos }}</h3>
 <h3>Email - {{ $data->email }}</h3>
 <h3>Celular - {{ $data->celular }}</h3>
 <h3>Género - {{ $data->genero }}</h3>
</div>
@endsection