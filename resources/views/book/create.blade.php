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

    <div class="form-group">
    <input type="text" name="user" placeholder="Lugar de inicio" class="form-control">
    </div>
    <div class="form-group">
    <input type="text" name="user" placeholder="Lugar de finalización" class="form-control">
    </div>
</div>
<div class="col-sm-4">
    <h2 class="text-center">Registrar</h2>
    <form>
        <div class="form-group">
        <input type="text" name="user" placeholder="Nombre" class="form-control">
        </div>
        <div class="form-group">
        <input type="text" name="user" placeholder="Apellidos" class="form-control">
        </div>
        <div class="form-group">
        <input type="text" name="user" placeholder="Teléfono" class="form-control">
        </div>
        <hr>
        <div class="form-group">
        <input type="email" name="user" placeholder="E-mail" class="form-control">
        </div>
        <div class="form-group">
        <input type="password" name="pass" placeholder="Password"class="form-control">
        </div>
        <p class="text-right"><input type="submit" name="login" value="Registrarse" class="btn btn-info"></p>
      </form>
</div>
@stop