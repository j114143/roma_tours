@extends('layout.user')
@section('titulo')
Bus {{$obj->placa}}
<a href="{{ route ('buses_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('buses')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading"><b>BUS</b></div>
        <div class="panel-body">
    <p><b>Placa: </b> {{$obj->placa}}</p>
    <p><b>Número Motor: </b> {{$obj->numero_motor}}</p>
    <p><b>Cantidad asientos: </b> {{$obj->cantidad_asientos}}</p>
    <p><b>Fecha Fabricación: </b> {{$obj->fecha_fabricacion}}</p>
    <p><b>Modelo: </b> {{$obj->modelo}}</p>
    <p><b>Número Soat: </b> {{$obj->numero_soat}}</p>
    <p><b>Número seguro: </b> {{$obj->numero_seguro}}</p>
    <p><b>Revisiòn Técnica: </b> {{$obj->revision_tecnica}}</p>
        </div>
    </div>
</div>
<div class="col-sm-4">
    <div class="panel panel-info">
        <div class="panel-heading"><b>Detalles de conductor</b></div>
        <div class="panel-body">
            @if($obj->conductor_id)
                <p><b>Nombre(s): </b> {{$obj->conductor->nombres}}</p>
                <p><b>Apellidos: </b> {{$obj->conductor->apellidos}}</p>
                <p><b>DNI: </b> {{$obj->conductor->dni}}</p>
                <p><b>Dirección: </b> {{$obj->conductor->direccion}}</p>
                <p><b>Teléfono: </b> {{$obj->conductor->telefono}}</p>
                <p><b>E-mail: </b> {{$obj->conductor->email}}</p>
                <p class="text-right"><a href="{{route('conductores_detail',['id'=>$obj->conductor_id])}}">Ver más</a></p>
                <a href="{{ route('buses_conductor',['id'=>$obj->id]) }}" class="btn btn-info">Cambiar conductor</a>
            @else
                <a href="{{ route('buses_conductor',['id'=>$obj->id]) }}" class="btn btn-info">Asignar conductor</a>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-3">
    <img src="{{ url($obj->image) }}" class="img-thumbnail ">
    <p class="text-center"><a href="{{ route('buses_image',['id'=>$obj->id]) }}">Cambiar imagen</a></p>
</div>
<div class="col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading"><b>Reservas del bus</b></div>
        <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Estado</th>
                    <th>Servicio</th>
                    <th>Cliente</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Precios</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
            @foreach($obj->reservas  as $reserva)
                @if($reserva->finalizado)
                    <tr class="info">
                @else
                    @if($reserva->confirmado)
                    <tr class="success">
                    @else
                    <tr class="danger">
                    @endif
                @endif
                    <td>{{$reserva->sku()}}</td>
                    <td>
                    @if($reserva->finalizado)
                    <i class="fa fa-check-ok fa-lg text-info" ></i>
                    @else
                        @if($reserva->confirmado)
                        <i class="fa fa-check-circle fa-lg text-success" ></i>
                        @else
                        <a title="Confirmar reserva" class="text-danger" href="{{ route('reservas_confirmar',['id'=>$reserva->id]) }}"><i class="fa fa-remove fa-lg text-danger" ></i></a>
                        @endif
                    @endif
                    </td>
                    <td>{{$reserva->servicio->nombre}}</td>
                    <td>{{$reserva->cliente->nombre}}</td>
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