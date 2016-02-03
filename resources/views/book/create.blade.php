@extends('layout.basico')

@section('titulo')
Reservar
@stop
@section('contenido')
<div class="col-sm-2 col-offset-2 "></div>
<div class="col-sm-4 ">
    <p><b>Servicio</b>: {{$obj->servicio->nombre}}</p>
    <p><b>Hora</b>: {{$obj->hora}}</p>
    <p><b>Fecha</b>: {{$obj->fecha}}</p>
    <p><b>Bus</b>: {{$obj->bus->placa}}</p>
    <p><b>Número asientos</b>: {{$obj->bus->cantidad_asientos}}</p>
    <p><b>Tipo de Bus</b>: {{$obj->bus->tipo->nombre}}</p>
</div>
<div class="col-sm-4">
    <div class="form-group">
    <input type="text" name="user" placeholder="Lugar de inicio" class="form-control">
    </div>
    <div class="form-group">
    <input type="text" name="user" placeholder="Lugar de finalización" class="form-control">
    </div>
    <h2 class="text-center">Sus datos</h2>
    {!!Form::open(array('url' => route('reservar_create',['disponibilidadId'=>$obj->id]) ,'id'=>'form','class'=>'form-horizontal'))!!}

        <div class="form-group">
            <input type="text" name="nombre" placeholder="Nombre o Razon Social" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="dni" placeholder="DNI ó RUC" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="telefono" placeholder="Teléfono" class="form-control">
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="E-mail" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="direccion" placeholder="Dirección" class="form-control">
        </div>
        <p class="text-right"><input type="submit" name="login" value="Reservar" class="btn btn-info"></p>
      </form>
</div>
@stop