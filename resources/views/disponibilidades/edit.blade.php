@extends('layout.user')
@section('titulo')
Editar disponibilidad <a href="{{ route('disponibilidades')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="row">
          <div class="col-sm-8">
            {!! Form::model($obj, [ 'method' => 'POST','url'=>route('disponibilidades_edit',['id'=>$obj->id]),'id'=>'form','class'=>'form-horizontal']) !!}
            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  {!!Form::input('text','nombre', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <a href="{{route('disponibilidades')}}" class="btn btn-danger">Cancelar</a>
                </div>
              </div>

           {!!Form::close()!!}
          </div>
        </div>
@stop