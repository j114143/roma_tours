@extends('layout.user')
@section('titulo')
Reservas
@stop

{!!Html::style('assets/monthly/css/monthly.css') !!}

@section('contenido')
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
<div class="monthly" id="mycalendar"></div>


    {!!Html::script('assets/monthly/js/jquery.js') !!}
    {!!Html::script('assets/monthly/js/monthly.js') !!}
    {!!Html::script('assets/js/jquery.chained.js')!!}
    <script type="text/javascript">
        $(window).load( function() {            
            var url_load = '{{ route("load_calendar") }}';
            $("#id_servicio").chained("#id_tipo_servicio");
            $('#mycalendar').monthly({
                callFromUser: '1',
                mode: 'event',
                xmlUrl: '/assets/monthly/events.xml'
            }); 
            //loadCalendar(url_load);
        });
        $( "#id_servicio" ).change(function() {
            var url_filter = '{{ route("filter_calendar") }}';
            filterCalendar(url_filter);
        });
    function loadCalendar(url){
        $.ajax({
            type: "GET",
            url: url,
            data: {},
            dataType: "xml",
            beforeSend: function() {
                alert("se envia consulta");
            },
            success: function(data) {
                alert("success");
                alert(data);
                $('#mycalendar').monthly({
                mode: 'event',
                xmlUrl: 'load_calendar'
            });
            },
            error: function(){
                alert("error");    
            }
        });
    } 
    function filterCalendar(url){
        servicio_id = $("#id_servicio").val();
        $.ajax({
            type: "GET",
            url: url,
            data: {servicio_id:servicio_id},
            dataType: "json",
            beforeSend: function() {
                alert('filtering');
            },
            success: function(data) {
                //$('#mycalendar').empty();
                var tmp = new Date();
                var setMonth = tmp.getMonth() + 1;
                var setYear = tmp.getFullYear();
                /*$('#mycalendar').monthly({
                    callFromUser: '1',
                    xmlUrl: '/assets/monthly/events.xml'
                }); */
            },
            error: function(){
            }
        });
    }        
    </script>     
@stop
