@extends('layout.user')
@section('titulo')
Agregar cliente
@stop
@section('contenido')
<div class="row">
    <div class="col-sm-8">
      {!!Form::open(array('url' => route('clientes_new'),'id'=>'form','class'=>'form-horizontal'))!!}

        <div class="form-group personal">
          <label class="col-sm-2 control-label"> </label>
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary active" id="persona">
                <input type="radio" name="empresa" id="option1"  checked value="0">Como persona </label>
              <label class="btn btn-primary" id="empresa">
                <input type="radio" name="empresa" id="option2"  autocomplete="off" value="1"> Como empresa
              </label>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" id="id_nombre">Nombre</label>
          <div class="col-sm-10">
            {!!Form::input('text','nombre', null ,['class'=>'form-control','maxlength' => 64])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" id="id_dni">RUC/DNI</label>
          <div class="col-sm-10">
            {!!Form::input('text','di', null ,['class'=>'form-control','maxlength' => 11])!!}
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

          <div class="form-group">
            <label class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-10">
              {!!Form::input('text','email', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
            </div>
          </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{route('clientes')}}" class="btn btn-danger">Cancelar</a>
          </div>
        </div>

     {!!Form::close()!!}
    </div>
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
function personaPlaceholder()
{
    $("#id_nombre").text("Apellidos y nombres");
    $("#id_dni").text("DNI");
    $("#es_empresa").val("0");
}
function empresaPlaceholder()
{
    $("#es_empresa").val("1");
    $("#id_nombre").text("Razon social");
    $("#id_dni").text("RUC");
}
</script>
@stop