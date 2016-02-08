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
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
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
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
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
        <td>{{$obj->servicio->nombre}}</td>
        <td>
          {{$obj->bus->placa}}
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
@stop