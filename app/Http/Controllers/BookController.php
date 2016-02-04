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
use App\Bus;
use App\Precio;
use Carbon\Carbon;
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
        $now = Carbon::now();
        return view('book.servicio',array('tipoServicios'=>$tipoServicios,
                'servicios'=>$servicios,
                'now'=>$now));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $busId,$servicioId)
    {
        $servicio = Servicio::findOrFail($servicioId);
        $bus = Bus::findOrFail($busId);
        $precio = Precio::where(array("servicio_id"=>$servicioId,"tipo_bus_id"=>$bus->id))->firstOrFail();

        $fecha_inicio = $request->input('fecha_inicio');

        return view('book.create',array("servicio"=>$servicio,
                                        "bus"=>$bus,
                                        "precio"=>$precio,
                                        "fecha_inicio"=>$fecha_inicio));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $busId, $servicioId)
    {
        $servicio = Servicio::findOrFail($servicioId);
        $bus = Bus::findOrFail($busId);
        $precio = Precio::where(array("servicio_id"=>$servicioId,"tipo_bus_id"=>$bus->id))->firstOrFail();;
        $fecha_inicio = $request->input('fecha_inicio');
        $inicio = Carbon::createFromFormat('Y/m/d H:i',$fecha_inicio);

        $input = $request->all();

        $cliente = new Cliente;
        $cliente->empresa = false;
        $cliente->nombre = $input['nombre'];
        $cliente->direccion = $input['direccion'];
        $cliente->dni = $input['dni'];
        $cliente->telefono = $input['telefono'];
        $cliente->email = $input['email'];
        $cliente->save();

        $reserva = new Reserva;
        $reserva->servicio_id = $servicio->id;
        $reserva->bus_id = $bus->id;
        $reserva->cliente_id = $cliente->id;

        $reserva->fecha_inicio = $inicio->toDateTimeString();
        $reserva->precio_soles = $precio->precio_soles;
        $reserva->precio_dolares = $precio->precio_soles;

        $reserva->lugar_inicio = $input['lugar_inicio'];;
        $reserva->lugar_fin = $input['lugar_fin'];;
        $reserva->save();

        $fin = $inicio;
        $fin->addHours($servicio->duracion);
        $reserva->fecha_fin = $fin->toDateTimeString();
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
        $obj = Reserva::findOrFail($id);
        return view('book.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify($id)
    {
        return view('book.verify');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $input = $request->all();

        $sku = $input['reserva_id'];
        $id = (int)substr($sku, 2);
        $obj = Reserva::findOrFail($id);
        return view('book.show',array("obj"=>$obj));
    }
    public function buscarBusDisponible($fecha_inicio)
    {
        $date = Carbon::createFromFormat('Y/m/d H:i',$fecha_inicio);

        $reservas = Reserva::where('fecha_inicio', '<=', $date->format('Y-m-d H:i:s'))
                            ->where('fecha_fin', '>=', $date->format('Y-m-d H:i:s'))
                            ->select('bus_id','fecha_inicio','fecha_fin')
                            ->get();

        $buses = Bus::select("id","placa","cantidad_asientos","tipo_id","modelo")->get();

        $disponibles = array();
        $reservado = 0;
        // Excluir los busses con reserva
        foreach ($buses as $key => $bus)
        {
            $reservado = 1;
            foreach ($reservas as $r => $reserva)
            {
                if ($reserva->bus_id == $bus->id)
                {
                    $reservado = 0;
                }
            }
            if ($reservado)
            {
                $disponibles[$key] = $bus;
            }
        }
        return $disponibles;
    }
    public function disponibilidad(Request $request)
    {
        $servicio_id = $request->input('servicio_id');
        $fecha_inicio = $request->input('fecha_inicio');

        return json_encode($this->buscarBusDisponible($fecha_inicio));
    }
}
