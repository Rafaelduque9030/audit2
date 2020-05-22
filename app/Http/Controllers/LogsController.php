<?php

namespace App\Http\Controllers;

use App\logs;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;
use APP;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logss=logs::paginate();

        return view('logs.index',compact('logss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // $permissions=Permission::get();

        //return view('Logss.create',compact('permissions'));
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
        //$logs = new Controller;
       // $logs->logs("Creacion De Logss", Auth::user()->id, Auth::user()->name);
        //
       // $logs=logs::create($request->all());

         //Actualizar permisos
       // $logs->permissions()->sync($request->get('permissions'));

       //return redirect()->route('Logss.edit',$logs->id)
       // ->with('info','Logso Guardado Con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function show(logs $logs)
    {   
        $logs = new Controller;
        $logs->logs("Ver Archivos", Auth::user()->id, Auth::user()->name);
        //
        return view('Logss.show',compact('logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function edit(logs $logs)
    {
        //
       // $permissions=Permission::get();

        //return view('Logss.edit',compact('logs','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, logs $logs)
    {
       // $logs = new Controller;
        //$logs->logs("Modificacion De Logss", Auth::user()->id, Auth::user()->name);
        //Actualizar logs
       // $logs->update($request->all());
        //Actualizar permisos
      //  $logs->permissions()->sync($request->get('permissions'));

       // return redirect()->route('Logss.edit',$logs->id)
        //->with('info','logs Actualizado Con Exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs $logs)
    {
        //
        //$logs = new Controller;
       // $logs->logs("Eliminacion De Logss", Auth::user()->id, Auth::user()->name);

       // $logs->delete();

        //return back()->with('info','Eliminado Correctamente');
    }

    public function pdf(){
        $logss=logs::all();
        $pdf = app('dompdf.wrapper');
        $html = '<table class="table table-striped table-hover">
                    
        <thead class="thead-light">
            <tr>
                <th widht="10px" >ID</th>
                <th>Usuario</th>
                <th>Accion</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($logss as $log) {
            $html .= '
            <tr>
                <td>'.$log->id.'</td>
                <td>'.$log->user.'</td>
                <td>'.$log->accion.'</td>
                <td>'.$log->time.'</td>
                <td>'.$log->name.'</td>   
            </tr>';
        }

        $html .= '</tbody></table>';
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
}