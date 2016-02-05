@extends('layout.user')
@section('titulo')
Reservas
@stop

{!!Html::style('assets/monthly/css/monthly.css') !!}

@section('contenido')
<div class="monthly" id="mycalendar"></div>
    {!!Html::script('assets/monthly/js/jquery.js') !!}
    {!!Html::script('assets/monthly/js/monthly.js') !!}
    <script type="text/javascript">
        $(window).load( function() {
            
            $('#mycalendar').monthly({
                mode: 'event',
                xmlUrl: '/assets/monthly/events.xml'
            });    
        });
    </script>     
@stop
