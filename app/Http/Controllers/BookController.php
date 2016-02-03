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
        $input = $request->all();
        $disponibilidad = Disponibilidad::findOrFail($disponibilidadId);
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
        $reserva->servicio_id = $disponibilidad->servicio_id;
        $reserva->bus_id = $disponibilidad->bus_id;
        $reserva->cliente_id = $cliente->id;

        $reserva->fecha_reserva = $disponibilidad->fecha;
        $reserva->hora_inicio = $disponibilidad->hora;
        $reserva->precio_soles = "10";
        $reserva->precio_dolares = "10";
        $reserva->lugar_inicio = "lugar inicio";
        $reserva->lugar_fin = "lugar fin";
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
        $obj = Disponibilidad::findOrFail($id);
        return view('book.show',array("obj"=>$obj));
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
