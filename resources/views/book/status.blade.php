@extends('layout.user')
@section('titulo')
Reservas
@stop

{!!Html::style('assets/css/monthly.css') !!}

@section('contenido')
<div class="monthly" id="mycalendar">

</div>

    
    {!!Html::script('assets/js/monthly.js') !!}
    {!!Html::script('assets/js/monthly_jquery.js') !!}
    <script type="text/javascript">
        $(window).load( function() {
            $('#mycalendar').monthly({
                mode: 'event',
                xmlUrl: 'events.xml'
            });    
        });
    </script>     
@stop
