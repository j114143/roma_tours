<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\TipoServicio;
use App\Http\Requests\TipoServicio\CreateTipoServicioRequest;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = TipoServicio::paginate(10);
        return view('tipo_servicios.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTipoServicioRequest $request)
    {
        $input = $request->all();

        $obj = new TipoServicio ;
        $obj->nombre = $input['nombre'];
        $obj->save();
        Session::flash('mensaje', 'Tipo de servicio agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('tipo_servicios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = TipoServicio::findOrFail($id);
        return view('tipo_servicios.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = TipoServicio::findOrFail($id);
        return view('tipo_servicios.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTipoServicioRequest $request, $id)
    {
        $input = $request->all();

        $obj = TipoServicio::findOrFail($id);
        $obj->nombre = $input['nombre'];
        $obj->save();
        Session::flash('mensaje', 'Tipo de servicio actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('tipo_servicios'));
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
