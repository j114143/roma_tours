@extends('layout.basico')

@section('titulo')
Reservar
@stop
@section('contenido')
<div class="col-sm-2 col-offset-2 "></div>
<div class="col-sm-4 ">
    <p><b>Servicio</b>: {{$servicio->nombre}} ({{$servicio->duracion}} horas)</p>
    <p><b>Fecha y Hora</b>: {{$fecha_inicio}}</p>
    <p><b>Bus</b>: {{$bus->placa}}</p>
    <p><b>Número asientos</b>: {{$bus->cantidad_asientos}}</p>
    <p><b>Tipo de Bus</b>: {{$bus->tipo->nombre}}</p>
    <h2> <small>S/</small> {{$precio->precio_soles}} - <small>USD $</small> {{$precio->precio_dolares}}</h2>
</div>
<div class="col-sm-4">
    {!!Form::open(array('id'=>'form','class'=>'form-horizontal'))!!}
        <div class="form-group">
        <input type="text" name="lugar_inicio" placeholder="Lugar de inicio" class="form-control">
        </div>
        <div class="form-group">
        <input type="text" name="lugar_fin" placeholder="Lugar de finalización" class="form-control">
        </div>
        <input type="hidden" name="fecha_inicio" value="{{$fecha_inicio}}">
        <input type="hidden" name="servicio_id" value="{{$servicio->id}}">
        <input type="hidden" name="bus_id" value="{{$bus->id}}">
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