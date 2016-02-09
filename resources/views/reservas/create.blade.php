@extends('layout.user')
@section('titulo')
Crear una reserva
@stop
@section('contenido')
<div class="col-sm-4 ">
        <form id="form" novalidate="novalidate" class="form-horizontal">

        <div class="form-group">
            <label class="control-label">Tipo de servicios</label>
            <select class="form-control" id="id_tipo_servicio" name="id_tipo_servicio">
                <option>---</option>
                @foreach ($tipoServicios as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Servicio</label>
            <select class="form-control" id="id_servicio" name="id_servicio">
                <option>---</option>
                @foreach ($servicios as $servicio)
                <option value="{{$servicio->id}}" class="{{$servicio->tipo_id}}">{{$servicio->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Fecha y hora</label>
            <input type="text" id="id_fecha_inicio" name="fecha_inicio" class="form-control" placeholder="2016/02/18 10:00" required>
        </div>
        <div class="form-group text-right">
            <input type="button" class="btn btn-success" value="Buscar" id="id_buscar">
        </div>
      </form>
</div>
<div class="col-sm-8">
    <div id="resultado" class="alert text-center"></div>
    <table class="table" id="disponibles">
        <thead>
            <tr>
                <th> </th>
                <th>Bus</th>
                <th>Modelo</th>
                <th>Asientos</th>
                <th>Precios</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div class="modal my-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reservar bus</h4>
      </div>
      <div class="modal-body">
          {!!Form::open(array('id'=>'form-1','class'=>'form-horizontal'))!!}
                <input type="hidden" name="fecha_inicio" id="fecha_inicio_h" value="">
                <input type="hidden" name="servicio_id" id="servicio_id_h" value="">
                <input type="hidden" name="bus_id" id="bus_id_h" value="">
                <div class="form-group">
                    <label class="col-sm-4 control-label">DNI / RUC del cliente</label>
                    <div class="col-sm-8">
                        <input type="text" name="di" placeholder="1122334455" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Lugar de inicio</label>
                    <div class="col-sm-8">
                        <input type="text" name="lugar_inicio" placeholder="Ejm: Nombre del hotel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Lugar de finalización</label>
                    <div class="col-sm-8">
                        <input type="text" name="lugar_fin" placeholder="Ejm: Aeropuerto" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Reservar Bus</button>
                </div>

            </form>
            </div>
        </div>
    </div>
</div>
{!!Html::script('assets/js/jquery.chained.js')!!}
{!!Html::script('assets/js/jquery.datetimepicker.full.js')!!}

<script type="text/javascript">
$("#id_servicio").chained("#id_tipo_servicio");
$("#id_fecha_inicio" ).datetimepicker({
    formatTime:'H:i',
    formatDate:'d-m-Y',
    minDate: 0 ,
    maxDate: '+31.12.1970',
    defaultDate:'+0.01.1970',
    defaultTime:'10:00',
    timepickerScrollbar:false
});
$(document).ready(function(){


    var servicio_id, fecha_inicio;
    var url = '{{ route("disponibilidad_bus") }}';
    $('#id_buscar').on('click', function() {

        if ($("#form").valid()) {
            $("#fecha_inicio_h").val($("#id_fecha_inicio").val());
            $("#servicio_id_h").val($("#id_servicio").val());
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
    function print(bus) {
        $("#bus_id_h").val($(bus).attr("id"));
        $('#myModal').modal('show');
    }
    function buscarBus(url){
        servicio_id = $("#id_servicio").val();
        fecha_inicio = $("#id_fecha_inicio").val();
        var urlBase = '{{ url() }}';
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
                    var items = "";http:
                    $.each( data, function( key, bus ) {
                        items += "<tr> <td><img src='"+urlBase+"/"+bus.image+"' height='60px'></td>";
                        items += "<td>"+bus.placa+"</td>";
                        items += "<td>"+bus.modelo+"</td>";
                        items += "<td>"+bus.cantidad_asientos+"</td>";
                        items += "<td><b>S/.</b> "+bus.precio_soles+" - <b>USD $</b> "+bus.precio_dolares+"</td>";
                        items += '<td><a class="btn btn-primary reservarbus" id="'+bus.id+'" onClick="print(this)">Reservar</a></td></tr>';
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
                    $("#disponibles tbody").html(" ");
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
      },
      di: {
        required: true,
        digits: true,
        minlength: 8,
        maxlength: 11
      },
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