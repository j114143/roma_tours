@extends('layout.user')
@section('titulo')
Agregar servicio
@stop
@section('contenido')
<div class="row">
    <div class="col-sm-8">
      {!!Form::open(array('url' => route('servicios_new'),'id'=>'form','class'=>'form-horizontal'))!!}

        <div class="form-group">
          <label class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-10">
            {!!Form::input('text','nombre', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tipo de servicio</label>
          <div class="col-sm-10">
            {!! Form::select('tipo_id', $tipos->toArray(), null, array('class' => 'form-control','id' => 'tipo_id')) !!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Duración</label>
          <div class="col-sm-10">
            {!!Form::input('text','duracion', null ,['class'=>'form-control','maxlength' => 50,'required'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Descripción</label>
          <div class="col-sm-10">
            {!!Form::textarea('descripcion',null, ['class'=>'form-control','required'])!!}
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