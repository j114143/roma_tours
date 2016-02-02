@extends('layout.user')
@section('titulo')
Licencias <a href="{{ route('licencias_new')}}" title="Agregar"  class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Conductor</th>
            <th>Número licencia</th>
            <th>Fecha emisión</th>
            <th>Fecha revalidación</th>
            <th>Dirección</th>
            <th> </th>
        </tr>
    </thead>
    @foreach($objs as $obj)
        <tr>
            <td>{{$obj->conductor_id}}</td>
            <td>{{$obj->numero_licencia}}</td>
            <td>{{$obj->fecha_emision}}</td>
            <td>{{$obj->fecha_revalidacion}}</td>
            <td>{{$obj->direccion}}</td>
            <td>
            <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('licencias_detail',['id'=>$obj->conductor_id]) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route ('licencias_edit',['id'=>$obj->conductor_id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
            </td>
        </tr>
    @endforeach
    </table>

    {!!$objs->render()!!}
@stop