@extends('layout.user')
@section('titulo')
Agregar bus
@stop
@section('contenido')
<div class="row">
    <div class="col-sm-8">
      {!!Form::open(array('url' => route('buses_new'),'id'=>'form','class'=>'form-horizontal'))!!}

        <div class="form-group">
          <label class="col-sm-2 control-label">Tipo de Bus</label>
          <div class="col-sm-10">
            {!! Form::select('tipo_id', $tipos->toArray(), null, array('class' => 'form-control','id' => 'tipo_id')) !!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Placa</label>
          <div class="col-sm-10">
            {!!Form::input('text','placa', null ,['class'=>'form-control','maxlength' => 6,'required'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Cantidad asientos</label>
          <div class="col-sm-10">
            {!!Form::input('text','cantidad_asientos', null ,['class'=>'form-control','maxlength' => 50,'required', 'onKeyPress' =>'return validar(event)'])!!}

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
            {!!Form::input('text','fecha_fabricacion', null ,['class'=>'form-control','id'=>'fecha_fabricacion_id','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Modelo</label>
          <div class="col-sm-10">
            {!!Form::input('text','modelo', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Soat</label>
          <div class="col-sm-10">
            {!!Form::input('text','numero_soat', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Seguro</label>
          <div class="col-sm-10">
            {!!Form::input('text','numero_seguro', null ,['class'=>'form-control','maxlength' => 11,'required' ])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Revisión técnica</label>
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

{!!Html::script('assets/js/jquery-ui.js')!!}
<script type="text/javascript">
$( "#fecha_fabricacion_id" ).datepicker({
    dateFormat: "yy-mm-dd" ,
    changeMonth: true,
    changeYear: true,
    maxDate: "+1Y",
    beforeShow: function() {
        setTimeout(function(){
            $('.ui-datepicker').css('z-index', 9999);
        }, 0);
    }
}) ;
$(document).ready(function(){
 $('#form').validate({
  errorElement: "span",
  rules: {
      placa: {
        required: true,
        minlength: 6,
        maxlength: 6
      },
      cantidad_asientos: {
        required: true,
        number: true,
        min: 4,
        max: 60
      },
      numero_motor: {
        required: true,
        min: 4
      },
      fecha_fabricacion: {
        required: true
      },
      numero_soat: {
        required: true,
        minlength: 1,
        maxlength: 16
      },
      numero_seguro: {
        required: true,
        minlength: 1,
        maxlength: 16
      },
      revision_tecnica: {
        required: true,
        minlength: 1,
        maxlength: 16
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
function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      if (tecla==44) return true;
      if (tecla==48) return true;
      if (tecla==49) return true;
      if (tecla==50) return true;
      if (tecla==51) return true;
      if (tecla==52) return true;
      if (tecla==53) return true;
      if (tecla==54) return true;
      if (tecla==55) return true;
      if (tecla==56) return true;
      if (tecla==57) return true;
      patron = /1/; //ver numero
      te = String.fromCharCode(tecla);
      return patron.test(te);
  }
</script>
@stop