@extends('layout.basico')

@section('titulo')
Iniciar sesión
@stop
@section('contenido')
<style type="text/css">
    .col-centered{
    float: none;
    margin: 0 auto;
}
</style>
<div class="col-sm-4 col-centered">
    {!!Form::open(array('id'=>'form','class'=>'form-horizontal'))!!}
        <div class="form-group">
            <input type="text" name="email" placeholder="E-mail" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <p class="text-center"><input type="submit" name="login" value="Iniciar sesión" class="btn btn-info"></p>
      </form>
</div>
@stop