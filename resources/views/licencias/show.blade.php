@extends('layout.user')
@section('titulo')
{{$obj->numero_licencia}}
<a href="{{ route ('licencias_edit',['id'=>$obj->conductor_id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('licencias')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
    <p><b>Número licencia: </b> S/: {{$obj->numero_licencia}}</p>
    <p><b>Fecha emisión: </b> USD $ {{$obj->fecha_emision}}</p>
    <p><b>Fecha revalidación: </b> {{$obj->fecha_revalidacion}}</p>
    <p><b>Direción: </b> {{$obj->dirección}}</p>
@stop