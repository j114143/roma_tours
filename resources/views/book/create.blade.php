@extends('layout.basico')

@section('contenido')
<div class="col-sm-2 col-offset-2 "></div>
<div class="col-sm-4 ">
    <h2 class="text-center">Iniciar sesión</h2>
        <form action="reservar/servicio">

        <div class="form-group">
        <input type="email" name="user" placeholder="E-mail" class="form-control">
        </div>
        <div class="form-group">
        <input type="password" name="pass" placeholder="Password"class="form-control">
        </div>
        <p><input type="submit" name="login" value="Iniciar sesión" class="btn btn-primary"></p>
      </form>
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