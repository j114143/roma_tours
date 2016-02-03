<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Disponibilidad;
use App\Precio;
use App\Http\Requests\Disponibilidad\CreateDisponibilidadRequest;

class DisponibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Disponibilidad::paginate(10);
        return view('disponibilidades.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disponibilidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDisponibilidadRequest $request)
    {
        $input = $request->all();

        $obj = new Disponibilidad ;
        $obj->servicio_id = $input['servicio_id'];
        $obj->bus_id = $input['bus_id'];
        $obj->hora = $input['hora'];
        $obj->fecha = $input['fecha'];
        $obj->save();
        Session::flash('mensaje', 'Disponibilidad agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('disponibilidades'));
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
        return view('disponibilidades.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Disponibilidad::findOrFail($id);
        return view('disponibilidades.edit', array('obj'=>$obj));
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
        $input = $request->all();

        $obj = Disponibilidad::findOrFail($id);
        $obj->servicio_id = $input['servicio_id'];
        $obj->bus_id = $input['bus_id'];
        $obj->hora = $input['hora'];
        $obj->fecha = $input['fecha'];
        $obj->save();
        Session::flash('mensaje', 'Disponibilidad actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('disponibilidades'));
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
    public function getToJson(request $request,$servicio_id)
    {
        $objs = Disponibilidad::where('servicio_id',$servicio_id)->get();
        $json = array();
        foreach ($objs as $key => $obj)
        {
            $json[$key]["id"] = $obj->id;
            $json[$key]["bus"] = $obj->bus->placa;
            $json[$key]["tipo_bus"] = $obj->bus->tipo->nombre;
            $precio = Precio::where(array("servicio_id"=>$servicio_id,"tipo_bus_id"=>$obj->bus->tipo_id))->first();;
            $json[$key]["asientos"] = $obj->bus->cantidad_asientos;
            $json[$key]["precio_soles"] = $precio->precio_soles;
            $json[$key]["precio_dolares"] = $precio->precio_dolares;
            $json[$key]["hora"] = $obj->hora;
            $json[$key]["fecha"] = $obj->fecha;
        }
        return $json;
    }
}
