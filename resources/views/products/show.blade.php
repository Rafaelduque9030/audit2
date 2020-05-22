@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Archivo</div>

                <div class="card-body">

                    <p><strong>Nombre<br></strong>{{ $product->name}} </p>
                    <p><strong>Descripcion<br></strong>{{ $product->description}} </p>
                    
                    
              
               
            </div>
              </div><div class="card-body">
                 <a class="btn btn-primary" href="{{url('/products')}}">Regresar</a>
                </div>
        </div>
    </div>
</div>
@endsection