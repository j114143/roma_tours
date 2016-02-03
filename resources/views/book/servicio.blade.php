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
            <p><b>Hora de inicio</b></p>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <p><b>Fecha</b></p>
            <input type="text" class="form-control">
        </div>
      </form>
</div>
<div class="col-sm-7">
    <p><b>Servicios disponibles:</b></p>
    <table class="table" id="disponibles">
        <thead>
            <tr>
                <th>Bus</th>
                <th>Tipo Bus</th>
                <th>Asientos</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $("#id_servicio").chained("#id_tipo_servicio");
    $(document).ready(function(){
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
                    items += "<td><a href='servicio/"+val.id+"' class='btn btn-success'>Reservar</a></td></tr>";
                });

                $("#disponibles tbody").html(items);
            });
        });
    });
</script>
@stop