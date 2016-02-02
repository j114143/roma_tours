<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Conductor;
use App\Http\Requests\Conductor\CreateConductorRequest;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conductores = Conductor::paginate(10);
        return view('conductores.index', array("conductores"=> $conductores));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conductores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConductorRequest $request)
    {
        $input = $request->all();

        $obj = new Conductor ;
        $obj->nombres = $input['nombres'];
        $obj->apellidos = $input['apellidos'];
        $obj->dni = $input['dni'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->email = $input['email'];
        $obj->save();
        Session::flash('mensaje', 'Conductor agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('conductores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Conductor::findOrFail($id);
        return view('conductores.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Conductor::findOrFail($id);
        return view('conductores.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateConductorRequest $request, $id)
    {
        $input = $request->all();

        $obj = Conductor::findOrFail($id);
        $obj->nombres = $input['nombres'];
        $obj->apellidos = $input['apellidos'];
        $obj->dni = $input['dni'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->email = $input['email'];
        $obj->save();
        Session::flash('mensaje', 'Conductor actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('conductores'));
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
