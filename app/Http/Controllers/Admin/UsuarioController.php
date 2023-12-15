<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Estatus;
use App\Roles;
use App\Area;
use DataTables;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $estatus = Estatus::all();
        $rols = Roles::all();
        $usuarios = User::all();
        $areas = Area::all();
        return view('admin.usuario.index', compact('estatus','rols','usuarios','areas'));
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
         $this->validate($request, [
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'role_id' => 'required',
                'subarea_id'=>  'required',
            ]
        );
       $usuario = User::create([
            'name' => $request->get('name'),
            'ap_paterno' => $request->get('ap_paterno'),
            'ap_materno' => $request->get('ap_materno'),
            'telefono' => $request->get('telefono'),
            'direccion' => $request->get('direccion'),
            'activo' => 1,
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role_id' => $request->get('role_id'),
            'subarea_id' => $request->get('subarea_id'),
        ]);

        alert()->success('El usuario ha sido creado correctamente.', 'Usuario creado');
        return redirect()->route('usuarios.index');

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
       $this->validate($request,[
            'name' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'telefono' => 'required',
            'role_id' => 'required',
            'activo' => 'required',
            'subarea_id' => 'required',
            'direccion' => 'required'
        ]);
        $usuario = User::find($id)->update($request->except(['_method', '_token']));
        alert()->success('El usuario ha sido actualizado correctamente.', 'Usuario actualizada');
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->update(['activo' => 2]);
        alert()->warning('El usuario ha sido suspendido.', 'Usuario suspendido');
        return redirect()->route('usuarios.index');
    }
}
