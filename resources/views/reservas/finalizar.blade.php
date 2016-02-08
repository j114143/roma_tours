@extends('layout.user')
@section('titulo')
Confirmar reserva
@stop
@section('contenido')
<div class="row">
  <div class="col-sm-8">
    <h2 class="text-muted">Finalizar el servicio {{$obj->sku() }}?</h2>
    {!! Form::model($obj, [ 'method' => 'POST','url'=>route('reservas_finalizar',['id'=>$obj->id]),'id'=>'form','class'=>'form-horizontal']) !!}
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-primary" type="submit">Confirmar</button>
            <a href="{{route('reservas_detail',['id'=>$obj->id])}}" class="btn btn-danger">Cancelar</a>
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