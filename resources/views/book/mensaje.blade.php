@extends('layout.basico')

@section('titulo')
Precio no definido
@stop
@section('contenido')
<p>Aun no hemos definido los precio para este servicio</p>
<p class="text-center"><a href="{{ route('book_now_servicio')}}">Volver</a></p>
@stop