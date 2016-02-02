@extends('layout.user')
@section('titulo')
{{$obj->nombres, $obj->apellidos}} <a href="{{ url ('conductores/'.$obj->id.'/edit') }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
@stop
@section('contenido')
    <p><b>Nombres: </b> {{$obj->nombres}}</p>
    <p><b>Apellidos: </b> {{$obj->apellidos}}</p>
    <p><b>DNI: </b> {{$obj->dni}}</p>
    <p><b>Dirección: </b> {{$obj->direccion}}</p>
    <p><b>Telefono: </b> {{$obj->telefono}}</p>
    <p><b>Email: </b> {{$obj->email}}</p>
@stop