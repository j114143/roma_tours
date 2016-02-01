@extends('layout.user')
@section('titulo')
{{$obj->nombre}}
<a href="{{ url ('servicios/'.$obj->id.'/edit') }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ url('servicios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
    <p><b>Precio Soles: </b> S/: {{$obj->precio_soles}}</p>
    <p><b>Precio Dolares: </b> USD $ {{$obj->precio_dolares}}</p>
    <p><b>Descripción: </b> {{$obj->descripcion}}</p>
@stop