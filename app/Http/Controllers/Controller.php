<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\logs;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function logs($accion,$user,$name){
        
        $fecha = date("Y-m-d H:i:s");
        $logs = new logs;
        $logs->accion = $accion;
        $logs->time = $fecha;
        $logs->user = $user;
        $logs->name = $name;
        $logs->save();
    }

}
