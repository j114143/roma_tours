@extends('layout.user')
@section('titulo')
Agregar servicio <a href="{{ route('servicios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="row">
    <div class="col-sm-8">
      {!! Form::model($obj, [ 'method' => 'POST','id'=>'form','class'=>'form-horizontal']) !!}
      <div class="form-group">
          <label class="col-sm-2 control-label">Razon social</label>
          <div class="col-sm-10">
            {!!Form::input('text','razon_social', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">RUC</label>
          <div class="col-sm-10">
            {!!Form::input('integer','ruc', null ,['class'=>'form-control','maxlength' => 11,'required'])!!}

          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Dirección</label>
          <div class="col-sm-10">
            {!!Form::input('text','direccion', null ,['class'=>'form-control','maxlength' => 120,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Teléfono</label>
          <div class="col-sm-10">
            {!!Form::input('text','telefono',null, ['class'=>'form-control','required'])!!}
           </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">E-mail</label>
          <div class="col-sm-10">
            {!!Form::input('text','email',null, ['class'=>'form-control','required'])!!}
           </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{route('servicios')}}" class="btn btn-danger">Cancelar</a>
          </div>
        </div>

     {!!Form::close()!!}
    </div>
  </div>
@stop