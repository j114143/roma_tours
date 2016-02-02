@extends('layout.user')
@section('titulo')
Empresas <a href="{{ route('empresas_new')}}" title="Agregar"  class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Razon social</th>
            <th>RUC</th>
            <th>direccion</th>
            <th>telefono</th>
            <th>email</th>
            <th> </th>
        </tr>
    </thead>
    @foreach($objs as $obj)
        <tr>
            <td>{{$obj->razon_social}}</td>
            <td>{{$obj->ruc}}</td>
            <td>{{$obj->direccion}}</td>
            <td>{{$obj->telefono}}</td>
            <td>{{$obj->email}}</td>
            <td>
            <a class="btn btn-info btn-xs" title="Ver detalles" href="{{ route('empresas_detail',['id'=>$obj->id]) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route ('empresas_edit',['id'=>$obj->id]) }}" title="Editar" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> </i></a>
            </td>
        </tr>
    @endforeach
    </table>

    {!!$objs->render()!!}
@stop