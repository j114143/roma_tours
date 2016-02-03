@extends('layout.user')
@section('titulo')
{{$obj->nombre}}
<a href="{{ route ('clientes_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('clientes')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<p><b>Nombre</b> {{$obj->nombre}} </p>
<?php
	if($obj->empresa)
		echo "<p><b>RUC: </b> {$obj->ruc}</p>";
	else
		echo "<p><b>DNI: </b> {$obj->dni}</p>";
?>
<p><b>Dirección: </b> {{$obj->direccion}}</p>
<p><b>Teléfono: </b> {{$obj->telefono}}</p>
<p><b>E-mail: </b> {{$obj->email}}</p>
@stop