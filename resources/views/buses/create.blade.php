@extends('layout.user')
@section('titulo')
Agregar bus
@stop
@section('contenido')
<div class="row">
    <div class="col-sm-8">
      {!!Form::open(array('url' => route('buses_new'),'id'=>'form','class'=>'form-horizontal'))!!}

        <div class="form-group">
          <label class="col-sm-2 control-label">Placa</label>
          <div class="col-sm-10">
            {!!Form::input('text','placa', null ,['class'=>'form-control','maxlength' => 6,'required'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Cantidad asientos</label>
          <div class="col-sm-10">
            {!!Form::input('text','cantidad_asientos', null ,['class'=>'form-control','maxlength' => 50,'required'])!!}

          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Número motor</label>
          <div class="col-sm-10">
            {!!Form::input('text','numero_motor', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Fecha fabricación</label>
          <div class="col-sm-10">
            {!!Form::input('text','fecha_fabricacion', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Modelo</label>
          <div class="col-sm-10">
            {!!Form::input('text','modelo', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">numero_soat</label>
          <div class="col-sm-10">
            {!!Form::input('text','numero_soat', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">numero_seguro</label>
          <div class="col-sm-10">
            {!!Form::input('text','numero_seguro', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">revision_tecnica</label>
          <div class="col-sm-10">
            {!!Form::input('text','revision_tecnica', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{route('buses')}}" class="btn btn-danger">Cancelar</a>
          </div>
        </div>

           {!!Form::close()!!}
          </div>
        </div>
@stop