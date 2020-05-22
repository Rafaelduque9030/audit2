<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::paginate();

        return view('users.index',compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $logs = new Controller;
        $logs->logs("Modificacion De Usuario", Auth::user()->id, Auth::user()->name);

        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $roles=Role::get();

        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $logs = new Controller;
        $logs->logs("Edicion De Usuario", Auth::user()->id, Auth::user()->name);
        //
        //Actualice  el usuario
        $user->update($request->all());
        //Actualice el usuario
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit',$user->id)
        ->with('info','Usuario Actualizado Con Exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $logs = new Controller;
        $logs->logs("Eliminacion De Usuario", Auth::user()->id, Auth::user()->name);
        //
        $user->delete();

        return back()->with('info','Eliminado Correctamente');
    }
}
