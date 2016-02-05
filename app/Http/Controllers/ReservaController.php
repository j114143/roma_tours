<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\Bus;
use App\Servicio;
use App\Precio;
use App\Reserva;
use App\Http\Requests\Reserva\UpdateReservaRequest;
class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Reserva::paginate(10);
        return view('reservas.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Reserva::findOrFail($id);
        return view('reservas.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Reserva::findOrFail($id);
        return view('reservas.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservaRequest $request, $id)
    {
        $input = $request->all();
        $obj = Reserva::findOrFail($id);
        $obj->lugar_inicio = $input['lugar_inicio'];
        $obj->lugar_fin = $input['lugar_fin'];
        $obj->precio_soles = $input['precio_soles'];
        $obj->precio_dolares = $input['precio_dolares'];
        $obj->save();

        Session::flash('mensaje', 'Reserva '.$obj->sku().' actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('reservas_detail',['id'=>$obj->id]));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmar($id)
    {
        $obj = Reserva::findOrFail($id);
        return view('reservas.confirmar', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmarUpdate(Request $request, $id)
    {
        $obj = Reserva::findOrFail($id);
        $obj->confirmado = true;
        $obj->save();
        Session::flash('mensaje', 'Reserva '.$obj->sku().' confirmado');
        Session::flash('alert-class','alert-success');
        return redirect(route('reservas_detail',['id'=>$obj->id]));
    }
}
