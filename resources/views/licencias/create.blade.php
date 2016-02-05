@extends('layout.user')
@section('titulo')
Agregar Licencia
@stop
@section('contenido')
<div class="row">
          <div class="col-sm-8">
            {!!Form::open(array('url' => route('licencias_new'),'id'=>'form','class'=>'form-horizontal'))!!}
            {!!Form::input('hidden','conductor_id', $conductor_id)!!}
            <div class="form-group">
                <label class="col-sm-2 control-label">Número de Licencia</label>
                <div class="col-sm-10">
                  {!!Form::input('text','numero_licencia', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Fecha emisión</label>
                <div class="col-sm-10">
                    {!!Form::input('text','fecha_emision', null ,['class'=>'form-control','id'=>'fecha_emision','maxlength' => 64,'required'])!!}
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Fecha revalidación</label>
                <div class="col-sm-10">
                    {!!Form::input('text','fecha_revalidacion', null ,['class'=>'form-control','id'=>'fecha_revalidacion','maxlength' => 64,'required'])!!}
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Dirección</label>
                <div class="col-sm-10">
                  {!!Form::input('text','direccion', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
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

{!!Html::script('assets/js/jquery-ui.js')!!}
<script type="text/javascript">
$( "#fecha_emision" ).datepicker({
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
$( "#fecha_revalidacion" ).datepicker({
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