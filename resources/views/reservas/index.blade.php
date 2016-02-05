@extends('layout.user')
@section('titulo')
Reservas <a href="{{ route('clientes_new')}}" title="Agregar"  class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th>Confirmado</th>
        <th>Servicio</th>
        <th>Bus</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        <th>Cliente</th>
        <th> </th>
    </tr>
</thead>
@foreach($objs as $obj)
    @if($obj->confirmado)
    <tr class="success">
    @else
    <tr class="danger">
    @endif
        <td>
        @if($obj->confirmado)
        Confirmado
        @else
        No confirmado
        @endif
        </td>
        <td>{{$obj->servicio->nombre}}</td>
        <td>{{$obj->bus->placa}}</td>
        <td>{{$obj->fecha_inicio}}</td>
        <td>{{$obj->fecha_fin}}</td>
        <td>
        <b>S/.</b> {{$obj->precio_soles}} -
        <b>USD $</b> {{$obj->precio_dolares}}
        </td>
        <td>
            <a href="{{ route('clientes_detail',['id'=>$obj->cliente_id]) }}">{{$obj->cliente->nombre}}</a>
        </td>
        <td>
        <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('reservas_detail',['id'=>$obj->id]) }}"><i class="fa fa-eye"></i></a>
        <a href="{{ route ('reservas_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
        </td>
    </tr>
@endforeach
</table>
{!!$objs->render()!!}
@stop