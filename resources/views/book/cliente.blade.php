@extends('layout.basico')

@section('titulo')
Ingrese sus datos
@stop
@section('contenido')
<div class="col-sm-4">
    {!!Form::open(array('id'=>'form','class'=>'form-horizontal'))!!}
        <input type="hidden" name="es_empresa" id="es_empresa" value="0">
        <div class="form-group personal">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary active" id="persona">
                <input type="radio" name="options" id="option1"  checked value="0">Como persona </label>
              <label class="btn btn-primary" id="empresa">
                <input type="radio" name="options" id="option2"  autocomplete="off" value="1"> Como empresa
              </label>
            </div>
        </div>
        <div class="datos">
            <div class="form-group">
              {!!Form::input('text','nombre', null ,['class'=>'form-control','maxlength' => 8,'id'=>'id_nombre','placeholder'=>'Nombre o Razon Social','required'])!!}
            </div>
            <div class="form-group">
                {!!Form::input('text','di', null ,['class'=>'form-control','maxlength' => 11,'id'=>'id_dni','placeholder'=>'DNI ó RUC','required'])!!}
            </div>
            <div class="form-group">
                {!!Form::input('text','telefono', null ,['class'=>'form-control','maxlength' => 124,'id'=>'id_telefono','placeholder'=>'Teléfono','required'])!!}
            </div>
            <div class="form-group">
                {!!Form::input('email','email', null ,['class'=>'form-control','id'=>'id_email','placeholder'=>'E-mail','required'])!!}
            </div>
            <div class="form-group">
                {!!Form::input('text','direccion', null ,['class'=>'form-control','minlength' => 5,'id'=>'id_direccion','placeholder'=>'Dirección','required'])!!}
            </div>
        </div>
        <p class="text-right"><input type="submit" name="login" value="Siguiente" class="btn btn-info"></p>
      </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
    personaPlaceholder();
    $("#persona").click(function(){
        personaPlaceholder();
    });
    $("#empresa").click(function(){
        empresaPlaceholder();
    });

     $('#form').validate({
      errorElement: "span",
      rules: {
          email: {
            required: true,
            minlength: 10,
            maxlength: 32,
            email:true
          },
          direccion: {
            required: true,
            minlength: 5,
            maxlength: 128
          },
          dni: {
            required: true
          },
          telefono: {
            required: true
          },
          nombre: {
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
function personaPlaceholder()
{
    $("#id_nombre").attr("placeholder", "Apellidos y nombres");
    $("#id_dni").attr("placeholder", "DNI");
    $("#es_empresa").val("0");
}
function empresaPlaceholder()
{
    $("#es_empresa").val("1");
    $("#id_nombre").attr("placeholder", "Razon social");
    $("#id_dni").attr("placeholder", "RUC");
}
</script>
@stop