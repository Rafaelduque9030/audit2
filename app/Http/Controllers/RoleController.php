<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles=Role::paginate();

        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions=Permission::get();

        return view('roles.create',compact('permissions'));
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
        $logs = new Controller;
        $logs->logs("Creacion De Roles", Auth::user()->id, Auth::user()->name);
        //
        $role=Role::create($request->all());

         //Actualizar permisos
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit',$role->id)
        ->with('info','Roleo Guardado Con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {   
        $logs = new Controller;
        $logs->logs("Ver Archivos", Auth::user()->id, Auth::user()->name);
        //
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $permissions=Permission::get();

        return view('roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $logs = new Controller;
        $logs->logs("Modificacion De Roles", Auth::user()->id, Auth::user()->name);
        //Actualizar role
        $role->update($request->all());
        //Actualizar permisos
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit',$role->id)
        ->with('info','Role Actualizado Con Exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $logs = new Controller;
        $logs->logs("Eliminacion De Roles", Auth::user()->id, Auth::user()->name);

        $role->delete();

        return back()->with('info','Eliminado Correctamente');
    }
}
