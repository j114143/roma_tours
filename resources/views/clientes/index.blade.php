@extends('layout.user')
@section('titulo')
Clientes <a href="{{ route('clientes_new')}}" title="Agregar"  class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th>Nombre Apellidos</th>
        <th>DNI</th>
        <th>Teléfono</th>
        <th>E-mail</th>
        <th>Direción</th>
        <th> </th>
    </tr>
</thead>
@foreach($objs as $obj)
    <tr>
        <td>{{$obj->nombre}} {{$obj->apellidos}}</td>
        <td>{{$obj->dni}}</td>
        <td>{{$obj->telefono}}</td>
        <td>{{$obj->email}}</td>
        <td>{{$obj->direccion}}</td>
        <td>
        <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('clientes_detail',['id'=>$obj->id]) }}"><i class="fa fa-eye"></i></a>
        <a href="{{ route ('clientes_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
        </td>
    </tr>
@endforeach
</table>
{!!$objs->render()!!}
@stop