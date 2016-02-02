@extends('layout.user')
@section('titulo')
Disponibilidad de buses <a href="{{ route('disponibilidades_new')}}" title="Agregar"  class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th> </th>
        </tr>
    </thead>
    @foreach($objs as $obj)
        <tr>
            <td>{{$obj->nombre}}</td>
            <td>
            <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('disponibilidades_detail',['id'=>$obj->id]) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route ('disponibilidades_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
            </td>
        </tr>
    @endforeach
    </table>

    {!!$objs->render()!!}
@stop