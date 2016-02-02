@extends('layout.user')
@section('titulo')
Agregar servicio <a href="{{ route('servicios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="row">
          <div class="col-sm-8">
            {!! Form::model($obj, [ 'method' => 'POST', 'url'=>route('licencias_edit'),'id'=>'form','class'=>'form-horizontal']) !!}


           {!!Form::close()!!}
          </div>
        </div>
@stop