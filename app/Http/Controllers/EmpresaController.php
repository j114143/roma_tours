<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Empresa;
use App\Http\Requests\Empresa\CreateEmpresaRequest;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Empresa::paginate(10);
        return view('empresas.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
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

        $obj = new Empresa ;
        $obj->razon_social = $input['razon_social'];
        $obj->ruc = $input['ruc'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->email = $input['email'];
        $obj->save();
        Session::flash('mensaje', 'Empresa agregado');
        Session::flash('alert-class','alert-success');
        return redirect('/empresas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Empresa::findOrFail($id);
        return view('empresas.show',array("obj"=>$obj));
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
        return view('empresas.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $obj = Empresa::findOrFail($id);
        $obj->razon_social = $input['razon_social'];
        $obj->ruc = $input['ruc'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->email = $input['email'];
        $obj->save();
        Session::flash('mensaje', 'Empresa actualizado');
        Session::flash('alert-class','alert-success');
        return redirect('/empresas');
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
