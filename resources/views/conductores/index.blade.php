@extends('layout.user')
@section('titulo')
Conductores
<a href="{{ route('conductores_new')}}" title="Agregar"  class="btn btn-warning btn-xs">
<i class="fa fa-plus-circle"> </i>
</a>
@stop
@section('contenido')
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
        	<th>Nombres</th>
        	<th>Apellidos</th>
        	<th>DNI</th>
        	<th>Dirección</th>
        	<th>Telefono</th>
        	<th>Email</th>
            <th> </th>
        </tr>
    </thead>
    @foreach($conductores as $conductor)
        <tr>
            <td>{{$conductor->nombres}}</td>
            <td>{{$conductor->apellidos}}</td>
            <td>{{$conductor->dni}}</td>
            <td>{{$conductor->direccion}}</td>
            <td>{{$conductor->telefono}}</td>
            <td>{{$conductor->email}}</td>
            <td>
            <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('conductores_detail',['id'=>$conductor->id]) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route('conductores_edit',['id'=>$conductor->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
            </td>
        </tr>
    @endforeach
    </table>

    {!!$conductores->render()!!}
@stop

