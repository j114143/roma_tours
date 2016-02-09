@extends('layout.user')
@section('titulo')
Agregar servicio <a href="{{ route('servicios')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="row">
  <div class="col-sm-8">
    {!! Form::model($obj, [ 'method' => 'POST','url'=>route('servicios_edit',['id'=>$obj->id]),'id'=>'form','class'=>'form-horizontal']) !!}
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
          {!!Form::input('text','duracion', null ,['class'=>'form-control','required'])!!}
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
<script type="text/javascript">
$(document).ready(function(){
 $('#form').validate({
  errorElement: "span",
  rules: {
      nombre: {
        required: true,
        minlength: 5,
        maxlength: 64,
      },
      tipo_id: {
        required: true
      },
      duracion: {
        required: true,
        number: true,
        min:1,
        max:24
      },
      descripcion: {
        required: true
      }
  },
  highlight: function(element) {
   $(element).closest('.form-group')
   .removeClass('has-success').addClass('has-error');
  },
  success: function(element) {
   element
   .addClass('help-inline')
   .closest('.form-group')
   .removeClass('has-error').addClass('has-success');
  }
 });
});
</script>

@stop