<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Cliente;
use App\Http\Requests\Empresa\CreateEmpresaRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Cliente::paginate(10);
        return view('clientes.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmpresaRequest $request)
    {
        $input = $request->all();

        $obj = new Cliente ;
        $obj->empresa = $input['empresa'];
        $obj->nombre = $input['nombre'];
        $obj->ruc = $input['ruc'];
        $obj->dni = $input['dni'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->email = $input['email'];
        $obj->save();
        Session::flash('mensaje', 'Empresa agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('clientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Cliente::findOrFail($id);
        return view('clientes.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Empresa::findOrFail($id);
        return view('clientes.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEmpresaRequest $request, $id)
    {
        $input = $request->all();

        $obj = Cliente::findOrFail($id);
        $obj->empresa = $input['empresa'];
        $obj->nombre = $input['nombre'];
        $obj->ruc = $input['ruc'];
        $obj->dni = $input['dni'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->email = $input['email'];
        $obj->save();
        Session::flash('mensaje', 'Empresa actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('empresas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
