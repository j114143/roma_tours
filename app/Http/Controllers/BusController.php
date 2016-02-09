<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Bus;
use App\Conductor;
use App\TipoBus;
use App\Http\Requests\Bus\CreateBusRequest;
use App\Http\Requests\Bus\ConductorBusRequest;
use App\Http\Requests\ImageRequest;
use App\Services\FileService;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Bus::paginate(10);
        return view('buses.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoBus::lists('nombre','id');
        return view('buses.create',array('tipos'=>$tipos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBusRequest $request)
    {
        $input = $request->all();

        $obj = new Bus ;
        $obj->placa = $input['placa'];
        $obj->cantidad_asientos = $input['cantidad_asientos'];
        $obj->numero_motor = $input['numero_motor'];
        $obj->fecha_fabricacion = $input['fecha_fabricacion'];
        $obj->modelo = $input['modelo'];
        $obj->numero_soat = $input['numero_soat'];
        $obj->numero_seguro = $input['numero_seguro'];
        $obj->revision_tecnica = $input['revision_tecnica'];
        $obj->tipo_id = $input['tipo_id'];
        $obj->save();
        Session::flash('mensaje', 'Bus Agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('buses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Bus::findOrFail($id);
        return view('buses.show', array('obj'=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Bus::findOrFail($id);
        $tipos = TipoBus::lists('nombre','id');

        return view('buses.edit', array('obj'=>$obj,'tipos'=>$tipos));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBusRequest $request, $id)
    {
        $input = $request->all();

        $obj = Bus::findOrFail($id);
        $obj->placa = $input['placa'];
        $obj->cantidad_asientos = $input['cantidad_asientos'];
        $obj->numero_motor = $input['numero_motor'];
        $obj->fecha_fabricacion = $input['fecha_fabricacion'];
        $obj->modelo = $input['modelo'];
        $obj->numero_soat = $input['numero_soat'];
        $obj->numero_seguro = $input['numero_seguro'];
        $obj->revision_tecnica = $input['revision_tecnica'];
        $obj->tipo_id = $input['tipo_id'];
        $obj->save();
        Session::flash('mensaje', 'Bus actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('buses'));
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
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function image($id)
    {

        $obj = Bus::findOrFail($id);
        return view('buses.image', array('obj'=>$obj));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageStore(ImageRequest $request, $id)
    {
        $file_service = new FileService();

        $input = $request->all();

        $obj = Bus::findOrFail($id);
        $obj->image = $file_service->upload($request->file('image'),'buses');
        $obj->save();
        Session::flash('mensaje', 'Imagen actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('buses_detail',['id'=>$id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function conductor($id)
    {
        $obj = Bus::findOrFail($id);
        $conductores = Conductor::lists('nombres','id');

        return view('buses.conductor', array('obj'=>$obj,'conductores'=>$conductores));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function conductorUpdate(ConductorBusRequest $request, $id)
    {
        $input = $request->all();

        $obj = Bus::findOrFail($id);
        $obj->conductor_id = $input['conductor_id'];
        $obj->save();
        Session::flash('mensaje', 'Conductor asignado a bus');
        Session::flash('alert-class','alert-success');
        return redirect(route('buses_detail',['id'=>$id]));
    }
}
