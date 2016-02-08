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
<div class="form-group">
    <p><b>Bus</b></p>
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
    $("#id_servicio").chained("#id_tipo_servicio");
        $(window).load( function() {            
            $('#mycalendar').monthly({
                mode: 'event',
                xmlUrl: '/assets/monthly/events.xml'
            });    
        });
    </script>     
@stop
