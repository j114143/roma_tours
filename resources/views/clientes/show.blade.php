@extends('layout.user')
@section('titulo')
{{$obj->nombre}}
<a href="{{ route ('clientes_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('clientes')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading"><b>Datos del cliente</b></div>
        <div class="panel-body">
            <p><b>Nombre</b> {{$obj->nombre}} </p>
            <p><b>@if($obj->empresa) RUC @else DNI @endif </b> {{ $obj->di}}</p>
            <p><b>Dirección: </b> {{$obj->direccion}}</p>
            <p><b>Teléfono: </b> {{$obj->telefono}}</p>
            <p><b>E-mail: </b> {{$obj->email}}</p>
        </div>
    </div>
</div>
<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading"><b>Reservas del cliente</b></div>
        <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Confirmado</th>
                    <th>Servicio</th>
                    <th>Bus</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Precios</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
            @foreach($obj->reservas  as $reserva)
                @if($reserva->confirmado)
                <tr class="success">
                @else
                <tr class="danger">
                @endif
                    <td>{{$reserva->sku()}}</td>
                    <td>
                    @if($reserva->confirmado)
                    Confirmado
                    @else
                    <a title="Confirmar reserva" class="text-danger" href="{{ route('reservas_confirmar',['id'=>$reserva->id]) }}">No confirmado</a>
                    @endif
                    </td>
                    <td>{{$reserva->servicio->nombre}}</td>
                    <td>{{$reserva->bus->placa}}</td>
                    <td>{{$reserva->fecha_inicio}}</td>
                    <td>{{$reserva->fecha_fin}}</td>
                    <td>
                    <b>S/.</b> {{$reserva->precio_soles}} -
                    <b>USD $</b> {{$reserva->precio_dolares}}
                    </td>
                    <td>
                    <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('reservas_detail',['id'=>$reserva->id]) }}"><i class="fa fa-eye"></i></a>
                    <a href="{{ route ('reservas_edit',['id'=>$reserva->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@stop