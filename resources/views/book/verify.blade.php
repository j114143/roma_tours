@extends('layout.basico')

@section('titulo')
Reservar
@stop
@section('contenido')
<div class="col-sm-4">
    {!!Form::open(array('id'=>'form','class'=>'form-horizontal'))!!}
        <div class="form-group">
            <p><b>Su código de reserva: </b></p>
            <input type="text" name="reserva_id" placeholder="RE-0000001" class="form-control">
        </div>
        <p class="text-right"><input type="submit" name="login" value="Reservar" class="btn btn-info"></p>
      </form>
</div>
@stop