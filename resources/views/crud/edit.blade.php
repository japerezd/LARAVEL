@extends('crud.parent')

@section('main')
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="right">
                <a href="{{ route('crud.index') }}" class="btn btn-default">Regresar</a>
            </div>
            <br />
            {{-- $data->id enviara una peticion al metodo de update del CrudController con el id --}}
     <form method="post" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">
        {{-- recordando que enctype="multipart/form-data" es para subir una imagen :D --}}
                @csrf
                {{-- Actualiza mensaje y redirecciona --}}
                @method('PATCH') {{-- Se usa el @method("PATCH") para rellenar el formulario --}}
      <div class="form-group">
                <label class="col-md-4 text-right">Ingresa tu nombre</label>
                     <div class="col-md-8">
                <input type="text" name="first_name" value="{{ $data->first_name }}" class="form-control input-lg" />
                    </div>
      </div>

        <br />
        <br />
        <br />


      <div class="form-group">
       <label class="col-md-4 text-right">Ingresa tu apellido</label>
       <div class="col-md-8">
        <input type="text" name="last_name" value="{{ $data->last_name }}" class="form-control input-lg" />
       </div>
      </div>

        <br />
        <br />
        <br />


      <div class="form-group">
       <label class="col-md-4 text-right">Selecciona una imagen de perfil</label>
       <div class="col-md-8">
        <input type="file" name="image" />
              <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
              {{-- Guardando los datos de la imagen en una variable escondida --}}
                        <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
       </div>
      </div>
      <br /><br /><br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Editar" />
      </div>
     </form>

@endsection
