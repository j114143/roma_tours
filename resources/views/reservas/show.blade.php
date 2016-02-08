@extends('layout.user')
@section('titulo')
{{$obj->sku() }}
<a href="{{ route ('reservas_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
<a href="{{ route('reservas')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="col-sm-4">
    <div class="panel panel-success">
        <div class="panel-heading"><b>Detalles de la reserva</b></div>
        <div class="panel-body">
            <p><b>Fecha de inicio:</b> {{$obj->fecha_inicio}}</p>
            <p><b>Fecha de fin:</b> {{$obj->fecha_fin}}</p>
            <p><b>Precio:</b> S/. {{$obj->precio_soles}} USD $ {{$obj->precio_dolares}} </p>
            <p><b>Lugar de inicio:</b> {{$obj->lugar_inicio}} </p>
            <p><b>Lugar de fin:</b> {{$obj->lugar_fin}} </p>
            <h2 class="text-center">
                @if($obj->confirmado)
                Confirmado
                @else
                No confirmado<br>
                <a class="btn btn-primary" href="{{route('reservas_confirmar',['id'=>$obj->id])}}">Confirmar</a>
                @endif
            </h2>
        </div>
    </div>

</div>
<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading"><b>Cliente</b></div>
        <div class="panel-body">
            @if($obj->cliente->empresa)
            <p><b>Razon social:</b> {{$obj->cliente->nombre}}</p>
            <p><b>RUC:</b> {{$obj->cliente->di}}</p>
            @else
            <p><b>Nombres y apellidos:</b> {{$obj->cliente->nombre}}</p>
            <p><b>DNI:</b> {{$obj->cliente->di}}</p>
            @endif
            <p><b>Dirección:</b> {{$obj->cliente->direccion}}</p>
            <p><b>Teléfono:</b> {{$obj->cliente->telefono}}</p>
            <p><b>E-mail:</b> {{$obj->cliente->email}} </p>

        </div>
    </div>

</div>
<div class="col-sm-4">
    <div class="panel panel-warning">
        <div class="panel-heading"><b>Servicio</b></div>
        <div class="panel-body">
            <p><b>Nombre:</b> {{$obj->servicio->nombre}}</p>
            <p><b>Duración:</b> {{$obj->servicio->duracion}} Horas</p>
            <p><b>Tipo de servicio:</b> {{$obj->servicio->tipo->nombre}}</p>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading"><b>Bus</b></div>
        <div class="panel-body">
            <p><b>Placa del BUS:</b> {{$obj->bus->placa}}</p>
            <p><b>Tipo de bus:</b> {{$obj->bus->tipo->nombre}}</p>
            <p><b>Cantidad asientos:</b> {{$obj->bus->cantidad_asientos}}</p>

        </div>
    </div>

</div>
@stop