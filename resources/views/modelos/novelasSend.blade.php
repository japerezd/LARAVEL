@extends("layouts.app2")
@section("title","Novelas")

@section("content")
<h1>Enviado</h1>
    {!!$envio." Enviado Correctamente <br>" !!}
    <a href="/novelas/create">Regresar</a>
@endsection
