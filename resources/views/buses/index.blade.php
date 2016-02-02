@extends('layout.user')
@section('titulo')
Buses de la empresa <a href="{{ route('buses_new')}}" title="Agregar"  class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Placa</th>
            <th>Tipo</th>
            <th>Candidad asientos</th>
            <th>Número motor</th>
            <th>Número soat</th>
            <th>Número seguro</th>
            <th> </th>
        </tr>
    </thead>
    @foreach($objs as $obj)
        <tr>
            <td>{{$obj->placa}}</td>
            <td>{{$obj->tipo->nombre}}</td>
            <td>{{$obj->cantidad_asientos}}</td>
            <td>{{$obj->numero_motor}}</td>
            <td>{{$obj->numero_soat}}</td>
            <td>{{$obj->numero_seguro}}</td>
            <td>
            <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('buses_detail',['id'=>$obj->id]) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route ('buses_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
            </td>
        </tr>
    @endforeach
    </table>

    {!!$objs->render()!!}
@stop