@extends('layout.user')
@section('titulo')
Servicios <a href="servicios/create" title="Agregar"><i class="fa fa-plus-circle"> </i></a>
@stop
@section('contenido')
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
        </tr>
    </thead>
    @foreach($objs as $obj)
        <tr>
            <td>{{$obj->nombre}}</td>
        </tr>
    @endforeach
    </table>

    {!!$objs->render()!!}
@stop