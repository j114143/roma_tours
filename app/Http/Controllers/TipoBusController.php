<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\TipoBus;
use App\Http\Requests\TipoBus\CreateTipoBusRequest;

class TipoBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = TipoBus::paginate(10);
        return view('tipo_buses.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_buses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTipoBusRequest $request)
    {
        $input = $request->all();

        $obj = new TipoBus ;
        $obj->nombre = $input['nombre'];
        $obj->save();
        Session::flash('mensaje', 'Tipo de Bus agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('tipo_buses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = TipoBus::findOrFail($id);
        return view('tipo_buses.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = TipoBus::findOrFail($id);
        return view('tipo_buses.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTipoBusRequest $request, $id)
    {
        $input = $request->all();

        $obj = TipoBus::findOrFail($id);
        $obj->nombre = $input['nombre'];
        $obj->save();
        Session::flash('mensaje', 'Tipo de Bus actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('tipo_buses'));
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
