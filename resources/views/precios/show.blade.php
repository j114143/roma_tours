@extends('layout.user')
@section('titulo')
{{$obj->nombre}}
<a href="{{ route ('precios_edit',['servicios_id'=>$obj->servicio_id,'tipo_bus_id'=>$obj->tipo_bus_id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('precios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<p><b>Servicio</b> : {{$obj->servicio->nombre}}</p>
<p><b>Tipo Bus</b> : {{$obj->tipoBus->nombre}}</p>
<p><b>Precio soles</b> : USD $ {{$obj->precio_soles}}</p>
<p><b>Precio dolares</b> : S/. {{$obj->precio_dolares}}</p>
@stop