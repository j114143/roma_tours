@extends('layout.basico')

@section('contenido')
<div class="col-sm-4 ">
        <form action="reservar/servicio">

        <div class="form-group">
            <p><b>Tipo de servicios</b></p>
            <select class="form-control" id="id_tipo_servicio">
                <option>---</option>
                @foreach ($tipoServicios as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <p><b>Elegir Servicio</b></p>
            <select class="form-control" id="id_servicio">
                <option>---</option>
                @foreach ($servicios as $servicio)
                <option value="{{$servicio->id}}" class="{{$servicio->tipo_id}}">{{$servicio->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <p><b>Fecha y hora</b></p>
            <input type="text" id="id_fecha_inicio" name="fecha_inicio" class="form-control">
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
    $("#id_buscar").click(function(){
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
    });
});
/*
        $("#id_tipo_servicio").change(function(){
            servicio_id = $("#id_tipo_servicio").val();
            $.getJSON( "/admin/disponibilidades/"+servicio_id+"/get_json", function( data ) {
                var items = "";
                $.each( data, function( key, val ) {
                    items += "<tr> <td>"+val.bus+"</td>";
                    items += "<td>"+val.tipo_bus+"</td>";
                    items += "<td>"+val.asientos+"</td>";
                    items += "<td>"+val.hora+"</td>";
                    items += "<td>"+val.fecha+"</td>";
                    items += "<td> <b>S/</b> "+val.precio_soles+" - <b>USD $</b> "+val.precio_dolares+"</td>";
                    items += "<td><a href='disponibilidades/"+val.id+"' class='btn btn-success'>Reservar</a></td></tr>";
                });

                $("#disponibles tbody").html(items);
            });
        });
*/
</script>
@stop