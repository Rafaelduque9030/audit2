@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuario</div>

                <div class="card-body">

                    <p><strong>Nombre<br></strong>{{ $user ->name}} </p>
                    <p><strong>Email<br></strong>{{ $user->email}} </p>
                    
                    
              
               
            </div>
              </div><div class="card-body">
                 <a class="btn btn-primary" href="{{url('/users')}}">Regresar</a>
                </div>
        </div>
    </div>
</div>
@endsection