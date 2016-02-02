@extends('layout.user')
@section('titulo')
Agregar Licencia
@stop
@section('contenido')
<div class="row">
          <div class="col-sm-8">
            {!!Form::open(array('url' => route('licencias_new'),'id'=>'form','class'=>'form-horizontal'))!!}

           {!!Form::close()!!}
          </div>
        </div>
@stop