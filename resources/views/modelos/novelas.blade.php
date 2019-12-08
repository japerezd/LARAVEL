@extends("layouts.app2")
@section("title","Catalogo de Novelas")

@section("content")
<h1>Formulario de Novelas en Laravel</h1>


<form action="/novelas" method="POST" class="form-group">
    @csrf
    <fieldset>

        <legend>Novelas</legend>

            {{-- @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach --}}
        <div class="form-group">
        <label for="title">Título</label> 
        <input type="text" name="title" class="form-control" value="{{old('title')}}"> 
            {!!$errors->first('title','<small><b>:message</b></small><br>')!!}
        </div>


        <div class="form-group">
            <label for="protagonista">Protagonista</label> 
            <input type="text" name="protagonista" class="form-control" value="{{old('protagonista')}}"> 
            {!!$errors->first('protagonista','<small><b>:message</b></small><br>')!!}
        </div>


        <div class="form-group">
            <label for="dir">Director</label> 
            <input type="text" name="dir" class="form-control" value="{{old('dir')}}">
            {!!$errors->first('dir','<small><b>:message</b></small><br>')!!}
        </div>


        <div class="form-group">
            <label for="year">Año</label> 
            <input type="number" name="year" class="form-control" value="{{old('year')}}"> 
            {!!$errors->first('year','<small><b>:message</b></small><br>')!!}
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
    </fieldset>
</form>
@endsection