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
use App\Http\Requests\Reserva\BookNowReservaRequest;
use App\Http\Requests\Cliente\CreateClienteRequest;
class BookController extends Controller
{
    public function cliente()
    {
        return view('book.cliente');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clienteStore(CreateClienteRequest $request)
    {
        $input = $request->all();
        $cliente = Cliente::where('di','=',$input['di'])->first();
        if (count($cliente)<1)
        {
            $cliente = new Cliente;
            $cliente->empresa = $input['es_empresa'];
            $cliente->nombre = $input['nombre'];
            $cliente->direccion = $input['direccion'];
            $cliente->di = $input['di'];
            $cliente->telefono = $input['telefono'];
            $cliente->email = $input['email'];
            $cliente->save();
        }
        return redirect(route('book_now_servicio',['cliente_id'=>$cliente->di]));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicio($cliente_di)
    {
        $tipoServicios = TipoServicio::all();
        $servicios = Servicio::all();
        return view('book.servicio',array('tipoServicios'=>$tipoServicios,
                'servicios'=>$servicios ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookNowReservaRequest $request, $cliente_id)
    {
        $input = $request->all();

        $servicio = Servicio::findOrFail($input['servicio_id']);
        $bus = Bus::findOrFail($input['bus_id']);
        $precio = Precio::where(array("servicio_id"=>$servicio->id,"tipo_bus_id"=>$bus->tipo_id))->first();;

        if (count($precio)<1)
        {
            $precio = new Precio;
            $precio->precio_soles = "0";
            $precio->precio_dolares = "0";
        }

        $fecha_inicio = $input['fecha_inicio'];
        $inicio = Carbon::createFromFormat('Y/m/d H:i',$fecha_inicio);
        $fin = $inicio->copy();
        $fin->addHours($servicio->duracion);

        $cliente = Cliente::where('di','=',$cliente_id)->first();

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
    public function buscarBusDisponible($fecha_inicio,$servicio_id)
    {
        $date = Carbon::createFromFormat('Y/m/d H:i',$fecha_inicio);

        $reservas = Reserva::where('fecha_inicio', '<=', $date->format('Y-m-d H:i:s'))
                            ->where('fecha_fin', '>=', $date->format('Y-m-d H:i:s'))
                            ->where('finalizado', '=', '0')
                            ->select('bus_id','fecha_inicio','fecha_fin')
                            ->get();

        $buses = Bus::select("id","placa","cantidad_asientos","tipo_id","modelo","image")->get();

        $disponibles = array();
        $reservado = 0;

        $n =0;
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
                $precios = $bus->precios($servicio_id);
                $bus["precio_soles"] = $precios->precio_soles;
                $bus["precio_dolares"] = $precios->precio_dolares;
                $disponibles[$n] = $bus;
                $n++;
            }
        }
        return $disponibles;
    }
    public function disponibilidad(Request $request)
    {
        $servicio_id = $request->input('servicio_id');
        $fecha_inicio = $request->input('fecha_inicio');

        return json_encode($this->buscarBusDisponible($fecha_inicio,$servicio_id));
    }
    public function getColor($reserva) //YYYY-MM-SS HH-MM-SS
    {
        $colors_cnf = array('#FF0000','#54FF00','#FBD300','#0515FB','#B406F9','#FF04E9','#e67e22','#03CDFD');
        $colors_sin = array('#F76F6F','#6FF77B','#F7E16D','#7A83F9','#D372F9','#FF7EF4','#d58512','#71DFF9');
        $ind = (($reserva->id + 7) % 8) ;
        if($reserva->confirmado)
            return $colors_cnf[$ind];
        else
            return $colors_sin[$ind];
    }
    public function getName($reserva)
    {
        if($reserva->confirmado)
            return "Servicio: ".$reserva->servicio."   Bus:".$reserva->bus."\nCLiente: ".$reserva->cliente."\nLugar de Origen:".$reserva->lugar_inicio."   Lugar de Destino: ".$reserva->lugar_fin."\n Estado: CONFIRMADO";
        else
            return "Servicio: ".$reserva->servicio."   Bus:".$reserva->bus."\nCLiente: ".$reserva->cliente."\nLugar de Origen:".$reserva->lugar_inicio."   Lugar de Destino: ".$reserva->lugar_fin."\n Estado: SIN CONFIRMAR";
    }
    public function status()
    {
        $reservas = Reserva::getReservas();
        $xml = new \DOMDocument("1.0");
        $xml_montly = $xml->createElement("monthly");
        foreach($reservas as $reserva)
        {
            $xml_event = $xml->createElement("event");
            $xml_id = $xml->createElement("id", $reserva->id);
            $xml_name = $xml->createElement("name", $this->getName($reserva));
            $xml_startdate = $xml->createElement("startdate", substr($reserva->fecha_inicio, 0, 10));
            $xml_enddate = $xml->createElement("enddate", substr($reserva->fecha_fin, 0, 10));
            $xml_starttime = $xml->createElement("starttime", substr($reserva->fecha_inicio, 11, 5));
            $xml_endtime = $xml->createElement("endtime", substr($reserva->fecha_fin, 11, 5));
            $xml_color = $xml->createElement("color", $this->getColor($reserva));
            //$xml_url = $xml->createElement("url", getURL($reserva));
            $xml_event->appendChild($xml_id);
            $xml_event->appendChild($xml_name);
            $xml_event->appendChild($xml_startdate);
            $xml_event->appendChild($xml_enddate);
            $xml_event->appendChild($xml_starttime);
            $xml_event->appendChild($xml_endtime);
            $xml_event->appendChild($xml_color);
            //$xml_event->appendChild($xml_url);

            $xml_montly->appendChild( $xml_event );

            //echo $xml_event;
        }
        $xml->appendChild( $xml_montly );

        $xml->save("../public/assets/monthly/events.xml");
        return view('book.status');
    }
}
