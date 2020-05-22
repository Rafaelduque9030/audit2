@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Role</div>

                <div class="card-body">

                    <p><strong>Nombre<br></strong>{{ $role ->name}} </p>
                    <p><strong>Slug<br></strong>{{ $role ->slug}} </p>
                    <p><strong>Descripcion<br></strong>{{ $role->description}} </p>
                    
                    
              
               
            </div>
              </div><div class="card-body">
                 <a class="btn btn-primary" href="{{url('/roles')}}">Regresar</a>
                </div>
        </div>
    </div>
</div>
@endsection