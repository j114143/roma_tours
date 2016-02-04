@extends('layout.basico')

@section('titulo')
Reservar
@stop
@section('contenido')
<div class="col-sm-2 col-offset-2 "></div>
<div class="col-sm-4 ">
    <p><b>Servicio</b>: {{$servicio->nombre}} ({{$servicio->duracion}} horas)</p>
    <p><b>Fecha y Hora</b>: {{$fecha_inicio}}</p>
    <p><b>Bus</b>: {{$bus->placa}}</p>
    <p><b>Número asientos</b>: {{$bus->cantidad_asientos}}</p>
    <p><b>Tipo de Bus</b>: {{$bus->tipo->nombre}}</p>
    <h2> <small>S/</small> {{$precio->precio_soles}} - <small>USD $</small> {{$precio->precio_dolares}}</h2>
</div>
<div class="col-sm-4">
    {!!Form::open(array('id'=>'form','class'=>'form-horizontal'))!!}
        <div class="form-group">
        <input type="text" name="lugar_inicio" placeholder="Lugar de inicio" class="form-control" required>
        </div>
        <div class="form-group">
        <input type="text" name="lugar_fin" placeholder="Lugar de finalización" class="form-control" required>
        </div>
        <input type="hidden" name="fecha_inicio" value="{{$fecha_inicio}}">
        <input type="hidden" name="servicio_id" value="{{$servicio->id}}">
        <input type="hidden" name="bus_id" value="{{$bus->id}}">
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
                <input type="text" name="nombre" id="id_nombre" placeholder="Nombre o Razon Social" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="dni" id="id_dni" placeholder="DNI ó RUC" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="telefono" placeholder="Teléfono" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="E-mail" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="form-control">
            </div>
        </div>
        <p class="text-right"><input type="submit" name="login" value="Reservar" class="btn btn-info"></p>
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