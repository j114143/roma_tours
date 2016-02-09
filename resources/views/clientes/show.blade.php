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
    <div class="panel panel-warning">
        <div class="panel-heading"><b>Reservas del cliente</b></div>
        <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Estado</th>
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
                    <td><a a class="btn" data-toggle="modal" data-target="#servicio{{$reserva->servicio_id}}">
          {{$reserva->servicio->nombre}}
        </a>
            <div class="modal fade" id="#servicio{{$reserva->servicio_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{$reserva->servicio->nombre}}</h4>
                  </div>
                  <div class="modal-body">
                  <p><b>Nombre</b>: {{$reserva->servicio->nombre}}</p>
                  <p><b>Duración</b>: {{$reserva->servicio->duracion}} Horas</p>
                  <p><b>Tipo</b>: {{$reserva->servicio->tipo->nombre}}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
                    </td>
                    <td>
        <a class="btn" data-toggle="modal" data-target="#myModal{{$reserva->bus->placa}}">
          {{$reserva->bus->placa}}
        </a>
            <div class="modal fade" id="myModal{{$reserva->bus->placa}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">BUS {{$reserva->bus->placa}}</h4>
                  </div>
                  <div class="modal-body">
                  <p><b>PLACA</b>: {{$reserva->bus->placa}}</p>
                  <p><b>TIPO</b>: {{$reserva->bus->tipo->nombre}}</p>
                  <p><b>MODELO</b>: {{$reserva->bus->modelo}}</p>
                  <p><b>CANT. ASIENTOS</b>: {{$reserva->bus->cantidad_asientos}}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            </td>
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