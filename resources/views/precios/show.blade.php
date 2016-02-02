@extends('layout.user')
@section('titulo')
{{$obj->nombre}}
<a href="{{ route ('precios_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('precios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<p>Tipo de servicio</p>
@stop