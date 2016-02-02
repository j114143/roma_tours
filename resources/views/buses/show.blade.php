@extends('layout.user')
@section('titulo')
Bus {{$obj->placa}}
<a href="{{ route ('buses_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('buses')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
    <p><b>Placa: </b> {{$obj->placa}}</p>
    <p><b>Número Motor: </b> {{$obj->numero_motor}}</p>
    <p><b>Cantidad asientos: </b> {{$obj->cantidad_asientos}}</p>
    <p><b>Fecha Fabricación: </b> {{$obj->fecha_fabricacion}}</p>
    <p><b>Modelo: </b> {{$obj->modelo}}</p>
    <p><b>Número Soat: </b> {{$obj->numero_soat}}</p>
    <p><b>Número seguro: </b> {{$obj->numero_seguro}}</p>
    <p><b>Revisiòn Técnica: </b> {{$obj->revision_tecnica}}</p>
    <p><b>Conductor: </b> {{$obj->conductor}}</p>
@stop