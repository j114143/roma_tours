<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Tipo;
use App\Http\Requests\Tipo\CreateTipoRequest;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Tipo::paginate(10);
        return view('tipos.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTipoRequest $request)
    {
        $input = $request->all();

        $obj = new Tipo ;
        $obj->nombre = $input['nombre'];
        $obj->save();
        Session::flash('mensaje', 'Tipo agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('tipos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Tipo::findOrFail($id);
        return view('tipos.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Tipo::findOrFail($id);
        return view('tipos.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTipoRequest $request, $id)
    {
        $input = $request->all();

        $obj = Tipo::findOrFail($id);
        $obj->nombre = $input['nombre'];
        $obj->save();
        Session::flash('mensaje', 'Tipo actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('tipos'));
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
