@extends('layout.user')
@section('titulo')
{{$obj->razon_social}}
<a href="{{ route ('empresas_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('empresas')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
    <p><b>RUC: </b> {{$obj->ruc}}</p>
    <p><b>Dirección: </b> {{$obj->direccion}}</p>
    <p><b>Teléfono: </b> {{$obj->telefono}}</p>
    <p><b>E-mail: </b> {{$obj->email}}</p>
@stop