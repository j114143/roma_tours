@extends('layout.user')
@section('titulo')
Definir precio
@stop
@section('contenido')
<div class="row">
  <div class="col-sm-8">
    {!!Form::open(array('url' => route('precios_new'),'id'=>'form','class'=>'form-horizontal'))!!}
        <div class="form-group">
            <label class="col-sm-2 control-label">Tipo  de bus</label>
            <div class="col-sm-10">
              {!! Form::select('tipo_bus_id', $tipos->toArray(), null, array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Servicio</label>
            <div class="col-sm-10">
              {!! Form::select('servicio_id', $servicios->toArray(), null, array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Precio soles</label>
            <div class="col-sm-10">
              <div class="input-group">
                <span class="input-group-addon">S/. </span>
                {!!Form::input('text','precio_soles', null ,['class'=>'form-control','required'])!!}
              </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Precio Dolares</label>
            <div class="col-sm-10">
              <div class="input-group">
                <span class="input-group-addon">USD $ </span>
              {!!Form::input('text','precio_dolares', null ,['class'=>'form-control','required'])!!}
              </div>
            </div>
        </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <a href="{{route('precios')}}" class="btn btn-danger">Cancelar</a>
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
      precio_soles: {
        required: true,
        number: true,
        min:1,
        max:3000
      },
      precio_dolares: {
        required: true,
        number: true,
        min:1,
        max:1000
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