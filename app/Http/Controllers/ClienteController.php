<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Cliente;
use App\Http\Requests\Cliente\CreateClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Cliente::orderBy('id', 'desc')->paginate(10);
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
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();
        $cliente = Cliente::where('di','=',$input['di'])->first();
        if (count($cliente)>0)
        {
            Session::flash('mensaje', 'Cliente ya esta registrado');
            Session::flash('alert-class','alert-info');
            return redirect(route('clientes_detail',['id'=>$cliente->id]));
        }
        $obj = new Cliente ;

        if($input['empresa']=="1")
            $obj->empresa = true;
        else
            $obj->empresa = false;

        $obj->nombre = $input['nombre'];
        $obj->di = $input['di'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->email = $input['email'];
        $obj->save();
        Session::flash('mensaje', 'Cliente agregado');
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
        $obj = Cliente::findOrFail($id);
        return view('clientes.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateClienteRequest $request, $id)
    {
        $input = $request->all();
        $obj = Cliente::findOrFail($id);
        if($input['empresa']=="1")
            $obj->empresa = true;
        else
            $obj->empresa = false;
        $obj->nombre = $input['nombre'];
        $obj->di = $input['di'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->email = $input['email'];
        $obj->save();
        Session::flash('mensaje', 'Cliente actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('clientes'));
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
