@extends('layout.user')
@section('titulo')
Agregar Conductor
@stop
@section('contenido')
<div class="row">
        <div class="col-sm-8">
            {!!Form::open(array('url' => route('conductores_new'),'id'=>'form','class'=>'form-horizontal'))!!}
              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  {!!Form::input('text','nombres', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-10">
                  {!!Form::input('text','apellidos', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">DNI</label>
                <div class="col-sm-10">
                  {!!Form::input('text','dni', null ,['class'=>'form-control','maxlength' => 8,'required'])!!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Dirección</label>
                <div class="col-sm-10">
                  {!!Form::input('text','direccion', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-10">
                  {!!Form::input('text','telefono', null ,['class'=>'form-control','maxlength' => 9,'required'])!!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  {!!Form::input('text','email', null ,['class'=>'form-control','maxlength' => 64,'required' ])!!}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <a href="{{route('conductores')}}" class="btn btn-danger">Cancelar</a>
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
        maxlength: 32,
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