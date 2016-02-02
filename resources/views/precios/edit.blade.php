@extends('layout.user')
@section('titulo')
Editar precio <a href="{{ route('precios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="row">
      <div class="col-sm-8">
        {!! Form::model($obj, [ 'method' => 'POST','url'=>route('precios_edit',['servicios_id'=>$obj->servicio_id,'tipo_bus_id'=>$obj->tipo_bus_id]),'id'=>'form','class'=>'form-horizontal']) !!}
        <div class="form-group">
            <label class="col-sm-2 control-label">Servicio</label>
            <div class="col-sm-10">
              {!!Form::input('text','servicio_id', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Tipo bus</label>
            <div class="col-sm-10">
              {!!Form::input('text','tipo_bus_id', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Precio soles</label>
            <div class="col-sm-10">
              {!!Form::input('text','precio_soles', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Precio Dolares</label>
            <div class="col-sm-10">
              {!!Form::input('text','precio_dolares', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
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