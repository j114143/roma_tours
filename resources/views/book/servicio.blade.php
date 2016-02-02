@extends('layout.basico')

@section('contenido')
<div class="col-sm-4 ">
        <form action="reservar/servicio">

        <div class="form-group">
            <p><b>Elegir Servicio</b></p>
            <select class="form-control">
                <option>---</option>
                <option>Cusco - Urubamba o viceversa</option>
                <option>Yucay - Estación Ollanta</option>
            </select>
        </div>
        <div class="form-group">
            <p><b>Hora de inicio</b></p>
            <input type="text" class="form-control">
        </div>
      </form>
</div>
<div class="col-sm-4">
    <p><b>Detalles del servicio:</b></p>
    <table class="table">
        <thead>
            <tr>
                <th>Tipo Bus</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tr>
            <td>Mini Bus</td>
            <td>$ 10</td>
        </tr>
        <tr>
            <td>Bus de 30</td>
            <td>$ 10</td>
        </tr>
        <tr>
            <td>Bus de 40</td>
            <td>$ 10</td>
        </tr>
    </table>

</div>
@stop