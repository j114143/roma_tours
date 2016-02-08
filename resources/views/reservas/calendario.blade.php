@extends('layout.user')
@section('titulo')
Reservas
@stop
@section('contenido')
    {!!Html::script('assets/js/moment.min.js')!!}
    {!!Html::script('assets/js/fullcalendar.min.js')!!}
    {!!Html::style('assets/css/fullcalendar.min.css')!!}
<div class="row form-horizontal">
    <div class="col-sm-2">
        <p>Confirmado: <label class="label" style="background:green;"> # R-0000000</label></br>No confirmado: <label class="label" style="background:red;"> # R-0000000</label></p>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="col-sm-5 control-label">Elegir BUS:</label>
            <div class="col-sm-7">
            {!! Form::select('bus_id', $buses->toArray(), null, array('class' => 'form-control','id' => 'bus_id')) !!}
            </div>
        </div>
    </div>
</div>
<div id="calendar"></div>
<script type="text/javascript">
  $(document).ready(function(){

  $('#calendar').fullCalendar({
        events:  {
            url: '{{route("reservas_tojson")}}',
            cache: true,
            data: function() { // a function that returns an object
                return {
                    bus_id:  $('#bus_id').val()
                };
            },
        }
    });
  $('#bus_id').change(function(){
        $('#calendar').fullCalendar('refetchEvents');
    });
});
</script>
@stop