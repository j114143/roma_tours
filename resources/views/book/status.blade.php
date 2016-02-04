@extends('layout.user')
@section('titulo')
Reservas
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/montly.css')}}">
@stop
@section('contenido')
<div class="monthly" id="mycalendar">

</div>

    
    {{!!HTML::script('assets/js/monthly.js') !!}}
    {{!!HTML::script('assets/js/monthly_jquery.js') !!}}
    <script type="text/javascript">
        $(window).load( function() {
            $('#mycalendar').monthly({
                mode: 'event',
                xmlUrl: 'assets/events.xml'
            });    
        });
    </script>     
@stop
