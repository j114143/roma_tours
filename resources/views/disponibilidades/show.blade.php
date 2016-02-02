@extends('layout.user')
@section('titulo')
{{$obj->nombre}}
<a href="{{ route ('disponibilidades_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('disponibilidades')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<p><b>Servicio : </b> {{$obj->servicio->nombre}}</p>
<p><b>Bus : </b> {{$obj->bus->placa}}</p>
<p><b>Hora : </b> {{$obj->hora}}</p>
<p><b>Fecha : </b> {{$obj->fecha}}</p>
@stop