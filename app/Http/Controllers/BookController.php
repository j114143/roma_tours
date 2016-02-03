<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Servicio;
use App\TipoServicio;
use App\Cliente;
use App\Reserva;
use App\Disponibilidad;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicio()
    {
        $tipoServicios = TipoServicio::all();
        $servicios = Servicio::all();
        return view('book.servicio',array('tipoServicios'=>$tipoServicios,'servicios'=>$servicios));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($disponibilidadId)
    {
        $obj = Disponibilidad::findOrFail($disponibilidadId);
        return view('book.create',array("obj"=>$obj));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disponibilidadId)
    {
        $obj = Disponibilidad::findOrFail($disponibilidadId);
        $cliente = new Cliente;
        $cliente->empresa = false;
        $cliente->nombre = $input['nombre'];
        $cliente->direccion = $input['direccion'];
        $cliente->dni = $input['dni'];
        $cliente->telefono = $input['telefono'];
        $cliente->email = $input['email'];
        $cliente->save();

        $reserva = new Reserva;
        $reserva->disponibilidad_id = $disponibilidadId;
        $reserva->servicio_id = $disponibilidadId;
        $reserva->bus_id = $disponibilidadId;
        $reserva->cliente_id = $disponibilidadId;

        $reserva->fecha_reserva = $disponibilidadId;
        $reserva->hora_inicio = $disponibilidadId;
        $reserva->precio_soles = $disponibilidadId;
        $reserva->precio_dolares = $disponibilidadId;
        $reserva->lugar_inicio = $disponibilidadId;
        $reserva->lugar_fin = $disponibilidadId;
        $reserva->save();

        return redirect(route('book_detail',['id'=>$reserva->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
