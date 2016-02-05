@extends('layout.user')
@section('titulo')
{{$obj->nombres}}
<a href="{{ route('conductores_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
@stop
@section('contenido')
<div class="col-sm-6">

    <p><b>Nombres: </b> {{$obj->nombres}}</p>
    <p><b>Apellidos: </b> {{$obj->apellidos}}</p>
    <p><b>DNI: </b> {{$obj->dni}}</p>
    <p><b>Dirección: </b> {{$obj->direccion}}</p>
    <p><b>Telefono: </b> {{$obj->telefono}}</p>
    <p><b>Email: </b> {{$obj->email}}</p>
</div>
<div class="col-sm-6">
    <div class="panel panel-info">
        <div class="panel-heading"><b>Licencia</b></div>
        <div class="panel-body">
        @if($obj->licencia)
        <p><b>Número licencia</b>: {{$obj->licencia->numero_licencia}}</p>
        <p><b>Fecha emisión</b>: {{$obj->licencia->fecha_emision}}</p>
        <p><b>Fecha revalidación</b>: {{$obj->licencia->fecha_revalidacion}}</p>
        <p><b>Dirección</b>: {{$obj->licencia->direcion}}</p>
        @else
        <p><a href="{{ route('licencias_new',['id'=>$obj->id]) }}" title="Agregar Licencia" class="btn btn-info"><i class="fa fa-plus"> </i> Agregar licencia</a></p>
        @endif
        </div>
    </div>
</div>
@stop