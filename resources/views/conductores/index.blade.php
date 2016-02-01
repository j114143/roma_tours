@extends('layout.user')
@section('titulo')
Conductores <a href="conductor/create" title="Agregar"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
    <table class="table table-bordered table-striped">
    <thead>
        <tr> 
        	<th>Nombre</th>
        	<th>Apellidos</th>
        	<th>DNI</th>
        	<th>Dirección</th>
        	<th>Telefono</th>
        	<th>Email</th>
        </tr>
    </thead>
    @foreach($conductores as $conductor)
        <tr>
            <td>{{$conductor->nombre}}</td>
            <td>{{$conductor->apellidos}}</td>
            <td>{{$conductor->dni}}</td>
            <td>{{$conductor->direccion}}</td>
            <td>{{$conductor->telefono}}</td>
            <td>{{$conductor->email}}</td>
        </tr>
    @endforeach
    </table>

    {!!$conductores->render()!!}
@stop

