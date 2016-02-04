@extends('layout.user')
@section('titulo')
{{$obj->nombre}}
<a href="{{ route ('servicios_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('servicios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<p><b>Duración: </b> {{$obj->duracion}} Horas</p>
<p><b>Descripción: </b> </p>
<p>{{$obj->descripcion}}</p>
@stop