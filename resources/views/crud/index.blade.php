@extends('crud.parent')

@section('main')

<div align="right">
    {{-- Con esto se verá un boton para añadir otra persona y nos manda al formulario --}}
    <a href="{{route('crud.create')}}" class="btn btn-success btn-sm">Añadir</a>
</div>

<br>
{{-- Esto es para que se vea el mensaje que se hizo con Crud::create de CrudController --}}

{{-- Este metodo verificará que si la variable success tiene datos --}}
@if ($message=Session::get("success"))
    <div class="alert alert-success"> 

        <p>{{$message}}</p>  {{--Esto desplegará el mensaje--}}
    </div>
   
@endif
<table class="table table-bordered table-striped">
 <tr>
  <th width="10%">Imagen</th>
  <th width="35%">Nombre</th>
  <th width="35%">Apellido</th>
  <th width="30%">Acción</th>
 </tr>
 {{-- Este $data viene de CrudController en el index --}}
 @foreach($data as $row)
  <tr>
      {{-- Para desplegar imagenes del folder public 
            Abajo del folder tendremos un folder de imagenes
        --}}
        {{-- Esto desplegará imagenes desde /public/images de laravel --}}
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75"/></td>
      {{-- <td><img src="/images/5.jpg/" class="img-thumbnail" width="75"/></td> --}}
   <td>{{ $row->first_name }}</td>
   <td>{{ $row->last_name }}</td>
   <td>
        {{-- mostrando link para desplegar informacion personal individual --}}
        {{-- primer argumento es para mostrar informacion.
            Con el segundo metodo nos creara la URL del metodo show con el valor de la id de la persona --}}
  
            <form action="{{route('crud.destroy',$row->id)}}" method="post">
                <a href="{{ route('crud.show',$row->id)}}" class="btn btn-primary btn-sm">Mostrar</a>
                <a href="{{ route('crud.edit',$row->id)}}" class="btn btn-warning btn-sm">Editar</a>  
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
            </form>
   </td>
</tr>
 @endforeach
</table>
{{-- <script>
    // with button class edit
    $(document).on('click','.edit',function{
        let id = $(this).attr('id'); /* attribute method */
        $('form_result').html('');
        $.ajax({
            // enviara request a esta url
            url:"/crud/"+id+"/edit",
            // lado de servidor recibira datos en formato json
            dataType:'json',
            success:function(html){
                $('#first_name').val(html.data.first_name);
                $('#last_name').val(html.data.last_name);
                $('#store_image').html("<img src= {{ URL::to('/') }}/images/"+html.data.image+"width='70' class='img-thumbnail' />");
                $('#store_image').append("<input type='hidden' name = 'hidden_image' value = '"+html.data.image+"' />");
                $('#hidden_id').val(html.data.id);
                $('.modal-title').text("Edit New Record");
                $('#action_button').val('Edit');
                $("#action").val("Edit");
                $('#formModal').modal('show');
            }
        })
    });
</script> --}}
{{-- Este metodo hará el link de paginacion --}}
{!! $data->links() !!}
@endsection