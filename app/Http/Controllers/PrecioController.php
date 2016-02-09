<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\Precio;
use App\Servicio;
use App\TipoBus;
use App\Http\Requests\Precio\CreatePrecioRequest;
use App\Http\Requests\Precio\UpdatePrecioRequest;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Precio::paginate(10);
        return view('precios.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoBus::lists('nombre','id');
        $servicios = Servicio::lists('nombre','id');
        return view('precios.create',array('tipos'=>$tipos,'servicios'=>$servicios));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePrecioRequest $request)
    {
        $input = $request->all();
        $obj2 = Precio::where(array("servicio_id"=>$input['servicio_id'],"tipo_bus_id"=>$input['tipo_bus_id']))->get();

        if (count($obj2)>0)
        {
            Session::flash('mensaje', 'Precio existe. Puede cambiar los precio');
            Session::flash('alert-class','alert-info');
            return redirect(route('precios_edit',['servicio_id'=>$input['servicio_id'],'tipo_bus_id'=>$input['tipo_bus_id']]));
        }
        $obj = new Precio ;
        $obj->servicio_id = $input['servicio_id'];
        $obj->tipo_bus_id = $input['tipo_bus_id'];
        $obj->precio_soles = $input['precio_soles'];
        $obj->precio_dolares = $input['precio_dolares'];
        $obj->save();
        Session::flash('mensaje', 'Precio agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('precios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($servicio_id,$tipo_bus_id)
    {
        $obj = Precio::where(array("servicio_id"=>$servicio_id,"tipo_bus_id"=>$tipo_bus_id))->firstOrFail();
        return view('precios.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($servicio_id,$tipo_bus_id)
    {
        $obj = Precio::where(array("servicio_id"=>$servicio_id,"tipo_bus_id"=>$tipo_bus_id))->firstOrFail();;
        return view('precios.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrecioRequest $request, $servicio_id,$tipo_bus_id)
    {
        $input = $request->all();

        $obj = Precio::where(array("servicio_id"=>$servicio_id,"tipo_bus_id"=>$tipo_bus_id))->firstOrFail();
        $obj->servicio_id = $input['servicio_id'];
        $obj->tipo_bus_id = $input['tipo_bus_id'];
        $obj->precio_soles = $input['precio_soles'];
        $obj->precio_dolares = $input['precio_dolares'];
        $obj->save();
        $obj = Precio::where(array("servicio_id"=>$servicio_id,"tipo_bus_id"=>$tipo_bus_id))
        ->update(['precio_soles' => $input['precio_soles'],'precio_dolares'=>$input['precio_dolares']]) ;
        Session::flash('mensaje', 'Precio actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('precios'));
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
