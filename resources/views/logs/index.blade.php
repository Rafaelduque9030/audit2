@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Historial de Movimientos</div>

                <div class="card-body" >
                   <table class="table table-striped table-hover">
                    
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
                        <tbody>
                             @foreach ($logss as $logsss)
                            <tr>
                                <td>{{ $logsss->id}}</td>
                                <td>{{ $logsss->user}}</td>
                                <td>{{ $logsss->accion}}</td>
                                <td>{{ $logsss->time}}</td>
                                <td>{{ $logsss->name}}</td>
                                          
                               

                       

                                
                            </tr>
                            @endforeach
                        </tbody>
                    
                        
                    </table>
                                   

                    
                </div>
                {{ $logss->render()}}
            </div>
        </div>
    </div>
</div>
@endsection
