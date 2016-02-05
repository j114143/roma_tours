@extends('layout.user')
@section('titulo')
Editar reserva <a href="{{ route('reservas')}}" title="Listar"  class="btn btn-success btn-xs"><i class="fa fa-list"> </i></a>
@stop
@section('contenido')
<div class="row">
  <div class="col-sm-8">
    {!! Form::model($obj, [ 'method' => 'POST','url'=>route('reservas_edit',['id'=>$obj->id]),'id'=>'form','class'=>'form-horizontal']) !!}
        <div class="form-group">
          <label class="col-sm-2 control-label">Lugar inicio</label>
          <div class="col-sm-10">
            {!!Form::input('text','lugar_inicio', null ,['class'=>'form-control', 'required'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Lugar fin</label>
          <div class="col-sm-10">
            {!!Form::input('text','lugar_fin', null ,['class'=>'form-control', 'required'])!!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Precio soles</label>
          <div class="col-sm-10">
            {!!Form::input('text','precio_soles', null ,['class'=>'form-control','required'])!!}
          </div>
        </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Precio dolares</label>
            <div class="col-sm-10">
              {!!Form::input('text','precio_dolares', null ,['class'=>'form-control','required'])!!}
            </div>
          </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-primary" type="submit">Guardar</button>
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
      lugar_inicio: {
        required: true,
        minlength: 5
      },
      lugar_fin: {
        required: true,
        minlength: 5
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