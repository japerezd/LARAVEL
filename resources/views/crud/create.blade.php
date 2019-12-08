@extends('crud.parent')


@section('main')
    @if($errors->any()) {{--Este metodo verificara si hay algun error de validacion --}}
    {{-- Para desplegar un mensaje de error de validacion --}}
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div align="right">
 <a href="{{ route('crud.index') }}" class="btn btn-default">Regresar</a>
</div>
{{-- multipart/formdata es para subir imagen --}}
<form method="post" action="{{ route('crud.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
  <label class="col-md-4 text-right">Ingresa tu nombre</label>
  <div class="col-md-8">
      {{-- en los name = se debe poner el nombre del campo de la bd --}}
   <input type="text" name="first_name" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Ingresa tu apellido</label>
  <div class="col-md-8">
   <input type="text" name="last_name" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Selecciona una imagen de perfil</label>
  <div class="col-md-8">
{{--  Aqui es donde se seleccionará la imagen con el tag de image. Es decir name="image"--}}
   <input type="file" name="image"id="image"/>
   <span id="store_image"></span>
  </div>
 </div>
 <br /><br /><br />
 <div class="form-group text-center">
     {{-- Con este boton el usuario podrá enviar el formulario de datos --}}
  <input type="submit" name="add" class="btn btn-primary input-lg" value="Añadir" />
 </div>

</form>

@endsection