<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Servicio;
use App\TipoServicio;
use App\Http\Requests\Servicio\CreateServicioRequest;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Servicio::paginate(10);
        return view('servicios.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoServicio::lists('nombre','id');
        return view('servicios.create',array('tipos'=>$tipos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServicioRequest $request)
    {
        $input = $request->all();

        $obj = new Servicio ;
        $obj->nombre = $input['nombre'];
        $obj->duracion = $input['duracion'];
        $obj->descripcion = $input['descripcion'];
        $obj->tipo_id = $input['tipo_id'];
        $obj->save();
        Session::flash('mensaje', 'Servicio agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('servicios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Servicio::findOrFail($id);
        return view('servicios.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Servicio::findOrFail($id);
        $tipos = TipoServicio::lists('nombre','id');

        return view('servicios.edit', array('obj'=>$obj,'tipos'=>$tipos));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateServicioRequest $request, $id)
    {
        $input = $request->all();

        $obj = Servicio::findOrFail($id);
        $obj->nombre = $input['nombre'];
        $obj->tipo_id = $input['tipo_id'];
        $obj->duracion = $input['duracion'];
        $obj->descripcion = $input['descripcion'];
        $obj->save();
        Session::flash('mensaje', 'Servicio actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('servicios'));
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
