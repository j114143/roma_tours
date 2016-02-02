<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Licencia;
use App\Http\Requests\Licencia\CreateLicenciaRequest;
class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Licencia::paginate(10);
        return view('licencias.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('licencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLicenciaRequest $request)
    {
        $input = $request->all();

        $obj = new Licencia ;
        $obj->conductor_id = $input['conductor_id'];
        $obj->numero_licencia = $input['numero_licencia'];
        $obj->fecha_emision = $input['fecha_emision'];
        $obj->fecha_revalidacion = $input['fecha_revalidacion'];
        $obj->direccion = $input['direccion'];
        $obj->save();
        Session::flash('mensaje', 'Licencia agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('licencias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Licencia::findOrFail($id);
        return view('licencias.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Licencia::where('conductor_id', '=', $id)->get();
        if(!sizeof($obj))
            return view('licencias.create', array('conductor_id'=>$id));   
        else    
            return view('licencias.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateLicenciaRequest $request, $conductor_id)
    {
        $input = $request->all();
        
        Licencia::where('conductor_id', '=', $conductor_id)
        ->update(array(
        "numero_licencia" => $input['numero_licencia'],
        "fecha_emision" => $input['fecha_emision'],
        "fecha_revalidacion" => $input['fecha_revalidacion'],
        "direccion" => $input['direccion'],   
        ));
        Session::flash('mensaje', 'Licencia actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('licencias'));
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
