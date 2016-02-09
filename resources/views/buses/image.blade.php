@extends('layout.user')
@section('titulo')
Editar bus {{$obj->placa}} <a href="{{ route('buses_detail',['id'=>$obj->id])}}" title="Ver detalles"  class="btn btn-info btn-xs"><i class="fa fa-eye"> </i></a>
@stop
@section('contenido')
<div class="row">
    <div class="col-sm-8">
      {!! Form::model($obj, [ 'method' => 'POST','files'=>true,'url'=>route('buses_image',['id'=>$obj->id]),'id'=>'form','class'=>'form-horizontal','onsubmit'=>'return checkSubmit();']) !!}
        <div class="form-group">
          <label for="inputImage" class="col-sm-2 control-label">Imagen</label>
          <div class="col-sm-10">
            {!! Form::file('image', ['class' => 'form-control', 'id' => 'inputImage','required']) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{route('buses_detail',['id'=>$obj->id])}}" class="btn btn-danger">Cancelar</a>
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