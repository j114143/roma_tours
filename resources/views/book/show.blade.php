@extends('layout.basico')

@section('titulo')
Detalles de su reserva
@stop
@section('contenido')
<div class="col-sm-6 ">
<p><b>Precio total de la reserav</b> S/. {{$obj->precio_soles}} - USD $ {{$obj->precio_dolares}} </p>

<p><b>Nota:</b> Una vez realziado el deposito enviar el baucher al correo de la empresa.</p>
<p><b>Nota:</b> El monto debera ser cancelado en el plazo de las siguientes 5 horas, caso contrario debera contactarse con el administrador de la empresa</p>
</div>

<div class="col-sm-4 ">
<p class="text-center"><b>Cuentas disponibles</b></p>
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
</div>
@stop