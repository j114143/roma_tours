@extends('layout.user')
@section('titulo')
Reservas <a href="{{ route('reservas_new')}}" title="Agregar"  class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-2x"> </i></a>
<a href="{{ route('reservas_calendario')}}" title="Mostrar en calendario"  class="btn btn-success btn-sm"><i class="fa fa-calendar fa-2x"></i></a>
@stop
@section('contenido')
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fa fa-gears"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">FINALIZADAS</span>
              <span class="info-box-number" id="finalizados"> </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-remove"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">NO CONFIRMADAS</span>
              <span class="info-box-number" id="noconfirmados"> </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CONFIRMADAS</span>
              <span class="info-box-number" id="confirmados"> </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL</span>
              <span class="info-box-number" id="total"> </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th>Código</th>
        <th>Estado</th>
        <th>Servicio</th>
        <th>Bus</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precios</th>
        <th>Cliente</th>
        <th> </th>
    </tr>
</thead>
@foreach($objs as $obj)
    @if($obj->finalizado)
        <tr class="info">
    @else
        @if($obj->confirmado)
        <tr class="success">
        @else
        <tr class="danger">
        @endif
    @endif
        <td>{{$obj->sku()}}</td>
        <td>
        @if($obj->finalizado)
        <i class="fa fa-check-ok fa-lg text-info" ></i>
        @else
            @if($obj->confirmado)
            <i class="fa fa-check-circle fa-lg text-success" ></i>
            @else
            <a title="Confirmar reserva" class="text-danger" href="{{ route('reservas_confirmar',['id'=>$obj->id]) }}"><i class="fa fa-remove fa-lg text-danger" ></i></a>
            @endif
        @endif
        </td>
        <td>
        <a type="button" class="btn btn-md" data-toggle="modal" data-target="#myModalS{{$obj->servicio_id}}">
          {{$obj->servicio->nombre}}
        </a>

        <div class="modal fade" id="myModalS{{$obj->servicio_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{$obj->servicio->nombre}}</h4>
      </div>
      <div class="modal-body">
      <p><b>DURACIÓN : </b> {{$obj->servicio->duracion}} Horas</p>
      <p><b>TIPO : </b> {{$obj->servicio->tipo->nombre}}</p>
      <p><a href="{{ route('servicios_detail',['id'=>$obj->servicio_id]) }}">Más detalles</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
            </td>
        <td>
        <a class="btn btn-md" data-toggle="modal" data-target="#myModal{{$obj->bus->placa}}">
          {{$obj->bus->placa}}
        </a>
            <div class="modal fade" id="myModal{{$obj->bus->placa}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">BUS {{$obj->bus->placa}}</h4>
                  </div>
                  <div class="modal-body">
                  <p><b>PLACA</b>: {{$obj->bus->placa}}</p>
                  <p><b>TIPO</b>: {{$obj->bus->tipo->nombre}}</p>
                  <p><b>MODELO</b>: {{$obj->bus->modelo}}</p>
                  <p><b>CANT. ASIENTOS</b>: {{$obj->bus->cantidad_asientos}}</p>
                  <p><a href="{{ route('buses_detail',['id'=>$obj->bus_id]) }}">Más detalles</a></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
        </td>
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
<script type="text/javascript">
    $(document).ready(function(){
        $.getJSON( "{{ route('reservas_cantidad') }}", function( data ) {
            $("#finalizados").text(data.finalizados);
            $("#confirmados").text(data.confirmados);
            $("#noconfirmados").text(data.noconfirmados);
            $("#total").text(data.total);
        })
        .error(function() { })
        .complete(function() { });
    });
</script>
@stop