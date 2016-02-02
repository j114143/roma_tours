@extends('layout.user')
@section('titulo')
Servicios <a href="{{ route('servicios_new')}}" title="Agregar"  class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th>Nombre</th>
        <th>Precio (S/.)</th>
        <th>Precio (USD $)</th>
        <th>Duración</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th> </th>
    </tr>
</thead>
@foreach($objs as $obj)
    <tr>
        <td>{{$obj->nombre}}</td>
        <td>S/. {{$obj->precio_soles}}</td>
        <td>USD $ {{$obj->precio_dolares}}</td>
        <td>{{$obj->duracion}} Horas</td>
        <td>{{$obj->tipo->nombre}}</td>
        <td>{{ str_limit($obj->descripcion, 80)}}</td>
        <td>
        <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('servicios_detail',['id'=>$obj->id]) }}"><i class="fa fa-eye"></i></a>
        <a href="{{ route ('servicios_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
        </td>
    </tr>
@endforeach
</table>

{!!$objs->render()!!}
@stop