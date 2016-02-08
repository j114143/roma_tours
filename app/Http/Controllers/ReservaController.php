<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;
use App\Cliente;
use App\Bus;
use App\Precio;
use App\Reserva;
use App\Servicio;
use App\TipoServicio;
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
        $objs = Reserva::orderBy('id', 'desc')->paginate(10);
        return view('reservas.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoServicios = TipoServicio::all();
        $servicios = Servicio::all();
        return view('reservas.create',array('tipoServicios'=>$tipoServicios,
                'servicios'=>$servicios ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $cliente_id = $input['di'];
        $servicio = Servicio::findOrFail($input['servicio_id']);
        $bus = Bus::findOrFail($input['bus_id']);
        $precio = Precio::where(array("servicio_id"=>$servicio->id,"tipo_bus_id"=>$bus->tipo_id))->firstOrFail();;


        $fecha_inicio = $input['fecha_inicio'];
        $inicio = Carbon::createFromFormat('Y/m/d H:i',$fecha_inicio);
        $fin = $inicio->copy();
        $fin->addHours($servicio->duracion);

        $cliente = Cliente::where('di','=',$cliente_id)->first();
        if (count($cliente)<1)
        {
            $cliente = new Cliente;
            $cliente->empresa = " ";
            $cliente->nombre = " ";
            $cliente->direccion = " ";
            $cliente->di = $cliente_id;
            $cliente->telefono = " ";
            $cliente->email = " ";
            $cliente->save();
        }
        $reserva = new Reserva;
        $reserva->servicio_id = $servicio->id;
        $reserva->bus_id = $bus->id;
        $reserva->cliente_id = $cliente->id;

        $reserva->fecha_inicio = $inicio->toDateTimeString();
        $reserva->precio_soles = $precio->precio_soles;
        $reserva->precio_dolares = $precio->precio_soles;

        $reserva->lugar_inicio = $input['lugar_inicio'];
        $reserva->lugar_fin = $input['lugar_fin'];;
        $reserva->fecha_fin = $fin->toDateTimeString();
        $reserva->save();

        return redirect(route('reservas_detail',['id'=>$reserva->id]));
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
