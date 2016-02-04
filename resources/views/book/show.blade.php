@extends('layout.basico')

@section('titulo')
<small>CÓDIGO RESERVA: </small> {{$obj->sku()}}
@stop
@section('contenido')
<div class="col-sm-6 ">
    <h3><small>ESTADO</small>@if ($obj->confirmado) <span class="label label-success">CONFIRMADO</span> @else <span class="label label-danger">NO CONFIRMADO </span>@endif</h3>
    <p><b>Precio total de la resera</b> S/. {{$obj->precio_soles}} - USD $ {{$obj->precio_dolares}} </p>
    <p><b>Fecha inicio :</b> {{$obj->fecha_inicio}}</p>
    <p><b>Fecha fin :</b> {{$obj->fecha_fin}}</p>
    <p><b>Servicio :</b> {{$obj->servicio->nombre}}</p>
    <p><b>Bus :</b> {{$obj->bus->placa}} - {{$obj->bus->tipo->nombre}}</p>
</div>

<div class="col-sm-4 ">
    <div class="list-group">
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">Cuenta BCP</h4>
        <p class="list-group-item-text">
        <b>Numero de cuenta:</b> 46549874654654<br>
        <b>Moneda:</b> Soles<br>
        </p>
      </a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">Cuenta BCP</h4>
        <p class="list-group-item-text">
        <b>Numero de cuenta:</b> 46549874654654<br>
        <b>Moneda:</b> Soles<br>
        </p>
      </a>
    </div>
    <p class="text-center"><a href="{{url()}}">Volver a inicio</a></p>
</div>
<div class="col-sm-12">
<hr>
<p><b>Nota:</b> Una vez realziado el deposito enviar el baucher al correo de la empresa.</br>
<b>Nota:</b> El monto debera ser cancelado en el plazo de las siguientes 5 horas, caso contrario debera contactarse con el administrador de la empresa</p>
</div>
@stop