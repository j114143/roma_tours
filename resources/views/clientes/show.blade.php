@extends('layout.user')
@section('titulo')
{{$obj->nombre}}
<a href="{{ route ('servicios_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('servicios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<p><b>Nombres y apellidos: </b> {{$obj->nombre}} {{$obj->apellidos}}</p>
<p><b>DNI: </b> {{$obj->dni}}</p>
<p><b>Dirección: </b> {{$obj->direccion}}</p>
<p><b>Teléfono: </b> {{$obj->telefono}}</p>
<p><b>E-mail: </b> {{$obj->email}}</p>
@stop