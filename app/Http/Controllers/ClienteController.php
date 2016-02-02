<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\User;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = User::where('es_admin','0')->paginate(10);
        return view('clientes.index',array("objs"=>$objs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $user = new User ;
        $user->nombre = $input['nombre'];
        $user->apellidos = $input['apellidos'];
        $user->dni = $input['dni'];
        $user->direccion = $input['direccion'];
        $user->telefono = $input['telefono'];
        $user->password = bcrypt($input['password']);
        $user->email = $input['email'];
        $user->es_admin = false;
        $user->save();
        Session::flash('mensaje', 'Cliente agregado');
        Session::flash('alert-class','alert-success');
        return redirect(route('clientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = User::findOrFail($id);
        return view('clientes.show',array("obj"=>$obj));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = User::findOrFail($id);
        return view('clientes.edit', array('obj'=>$obj));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $input = $request->all();

        $obj = User::findOrFail($id);
        $obj->nombre = $input['nombre'];
        $obj->apellidos = $input['apellidos'];
        $obj->dni = $input['dni'];
        $obj->direccion = $input['direccion'];
        $obj->telefono = $input['telefono'];
        $obj->save();
        Session::flash('mensaje', 'Información de cliente actualizado');
        Session::flash('alert-class','alert-success');
        return redirect(route('clientes'));
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
