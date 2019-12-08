@extends('crud.parent')

@section('main')

<div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('crud.index') }}" class="btn btn-default">Regresar</a>
        </div>
 <br />
 {{--Se esta desplegando la imagen  --}}
 <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
 {{-- nombre - $data-first_name. Con esto despliega el nombre y apellido correspondiente --}}
 <h3>Nombre - {{ $data->first_name }} </h3>
 <h3>Apellido - {{ $data->last_name }}</h3>
</div>
@endsection