@extends('layout.basico')

@section('contenido')
<div class="col-sm-4 ">
        <form action="reservar/servicio" id="form" novalidate="novalidate">

        <div class="form-group">
            <p><b>Tipo de servicios</b></p>
            <select class="form-control" id="id_tipo_servicio" name="id_tipo_servicio">
                <option>---</option>
                @foreach ($tipoServicios as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <p><b>Elegir Servicio</b></p>
            <select class="form-control" id="id_servicio" name="id_servicio">
                <option>---</option>
                @foreach ($servicios as $servicio)
                <option value="{{$servicio->id}}" class="{{$servicio->tipo_id}}">{{$servicio->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <p><b>Fecha y hora</b></p>
            <input type="text" id="id_fecha_inicio" name="fecha_inicio" class="form-control" required>
        </div>
        <div class="form-group text-right">
            <input type="button" class="btn btn-success" value="Buscar" id="id_buscar">
        </div>
      </form>
</div>
<div class="col-sm-7">
    <p><b>Servicios disponibles:</b></p>
    <div id="resultado" class="alert text-center"></div>
    <table class="table" id="disponibles">
        <thead>
            <tr>
                <th>Bus</th>
                <th>Modelo</th>
                <th>Asientos</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
{!!Html::script('assets/js/jquery.chained.js')!!}
{!!Html::script('assets/js/jquery.datetimepicker.full.js')!!}

<script type="text/javascript">
$("#id_servicio").chained("#id_tipo_servicio");
$("#id_fecha_inicio" ).datetimepicker({
    formatTime:'H:i',
    formatDate:'d-m-Y',
    defaultDate:'+03.01.1970', // it's my birthday
    defaultTime:'10:00',
    timepickerScrollbar:false
});
</script>
<script type="text/javascript">
$(document).ready(function(){

    var servicio_id, fecha_inicio;
    var url = '{{ route("disponibilidad_bus") }}';
    $('#id_buscar').on('click', function() {

        if ($("#form").valid()) {
            buscarBus(url);
        } else {
            $('#resultado').text('Elegir servicio y fecha para el cual quiere reservar bus');
            $('#resultado').removeClass("alert-success");
            $('#resultado').removeClass("alert-danger");
            $('#resultado').removeClass("alert-warning");
            $('#resultado').addClass("alert-danger");
            $('#resultado').show();
        }
    });
});

    function buscarBus(url){
        servicio_id = $("#id_servicio").val();
        fecha_inicio = $("#id_fecha_inicio").val();

        $.ajax({
            type: "GET",
            url: url,
            data: {servicio_id:servicio_id,fecha_inicio:fecha_inicio},
            dataType: "json",
            beforeSend: function() {
                $('#resultado').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Buscando...');
                $('#resultado').removeClass("alert-success");
                $('#resultado').removeClass("alert-danger");
                $('#resultado').removeClass("alert-warning");
                $('#resultado').addClass("alert-warning");
                $('#resultado').show();
            },
            success: function(data) {
                if (data.length>0)
                {
                    var items = "";
                    $.each( data, function( key, bus ) {
                        items += "<tr> <td>"+bus.placa+"</td>";
                        items += "<td>"+bus.modelo+"</td>";
                        items += "<td>"+bus.cantidad_asientos+"</td>";
                        items += "<td><a href='now/"+bus.id+"/"+servicio_id+"?fecha_inicio="+fecha_inicio+"' class='btn btn-success'>Reservar</a></td></tr>";
                    });

                    $('#resultado').removeClass("alert-success");
                    $('#resultado').removeClass("alert-danger");
                    $('#resultado').removeClass("alert-warning");

                    $('#resultado').text(data.length+" bus(es) disponibles");
                    $('#resultado').addClass("alert-success");
                    $("#disponibles tbody").html(items);
                }else{
                    $('#resultado').text("Buses no disponibles");
                    $('#resultado').addClass("alert-danger");
                }
                $('#resultado').show();
            },
            error: function(){
            }
        });
    }
</script><script type="text/javascript">
    $(document).ready(function(){
 $('#form').validate({
  errorElement: "span",
  rules: {
      fecha_inicio: {
        required: true
      },
      id_tipo_servicio: {
        required: true
      },
      id_servicio: {
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
</script>
@stop