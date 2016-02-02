@extends('layout.user')
@section('titulo')
Precios <a href="{{ route('precios_new')}}" title="Agregar"  class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Servicio</th>
            <th>Tipo bus</th>
            <th>Precio Soles</th>
            <th>Precio Dolares</th>
            <th> </th>
        </tr>
    </thead>
    @foreach($objs as $obj)
        <tr>
            <td>{{$obj->servicio->nombre}}</td>
            <td>{{$obj->tipoBus->nombre}}</td>
            <td>S/. {{$obj->precio_soles}}</td>
            <td>USD $ {{$obj->precio_dolares}}</td>
            <td>
            <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('precios_detail',['servicios_id'=>$obj->servicio_id,'tipo_bus_id'=>$obj->tipo_bus_id]) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route ('precios_edit',['servicios_id'=>$obj->servicio_id,'tipo_bus_id'=>$obj->tipo_bus_id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
            </td>
        </tr>
    @endforeach
    </table>

    {!!$objs->render()!!}
@stop