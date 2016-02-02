@extends('layout.user')
@section('titulo')
Agregar precio
@stop
@section('contenido')
<div class="row">
          <div class="col-sm-8">
            {!!Form::open(array('url' => route('precios_new'),'id'=>'form','class'=>'form-horizontal'))!!}
              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  {!!Form::input('text','nombre', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <a href="{{route('precios')}}" class="btn btn-danger">Cancelar</a>
                </div>
              </div>

           {!!Form::close()!!}
          </div>
        </div>
@stop