@extends('layout.user')
@section('titulo')
{{$obj->nombres}}
<a href="{{ route('conductores_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('licencias_edit',['id'=>$obj->id]) }}" title="Agregar Licencia" class="btn btn-warning btn-xs"><i class="fa fa-plus"> </i></a>
@stop
@section('contenido')
    <p><b>Nombres: </b> {{$obj->nombres}}</p>
    <p><b>Apellidos: </b> {{$obj->apellidos}}</p>
    <p><b>DNI: </b> {{$obj->dni}}</p>
    <p><b>Dirección: </b> {{$obj->direccion}}</p>
    <p><b>Telefono: </b> {{$obj->telefono}}</p>
    <p><b>Email: </b> {{$obj->email}}</p>
@stop