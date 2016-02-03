@extends('layout.user')
@section('titulo')
Editar información del cliente <a href="{{ route('clientes')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="row">
  <div class="col-sm-8">
    {!! Form::model($obj, [ 'method' => 'POST','url'=>route('clientes_edit',['id'=>$obj->id]),'id'=>'form','class'=>'form-horizontal']) !!}
      <div class="form-group">
          <label class="col-sm-2 control-label">Empresa</label>
          <div class="col-sm-10">
            {!! Form::checkbox('empresa', 'true') !!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-10">
            {!!Form::input('text','nombre', null ,['class'=>'form-control','maxlength' => 64])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">RUC/DNI</label>
          <div class="col-sm-10">
            <?php if($obj->empresa) {?>
                {!!Form::input('text','ruc', null ,['class'=>'form-control','maxlength' => 11])!!}
            <?php } else {?>
                {!!Form::input('text','dni', null ,['class'=>'form-control','maxlength' => 11])!!}
            <?php } ?>    
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Teléfono</label>
          <div class="col-sm-10">
            {!!Form::input('text','telefono', null ,['class'=>'form-control','maxlength' => 9,'required'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Dirección</label>
          <div class="col-sm-10">
            {!!Form::input('text','direccion', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
          </div>
        </div>
        <fieldset>
          <legend >Datos de inicio de sesión</legend>

          <div class="form-group">
            <label class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-10">
              {!!Form::input('text','email', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
            </div>
          </div>
        </fieldset>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{route('clientes')}}" class="btn btn-danger">Cancelar</a>
          </div>
        </div>

   {!!Form::close()!!}
  </div>
</div>
@stop