
@extends('layouts.app')

@section('content')


<div class="container">

@if (Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
    {{  Session::get('Mensaje')}}
</div>
  
@endif



<br/>
<br/>

<table class="table table-light table-hover">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Archivo</th>
            <th>Acciones</th>
            
        </tr>
    </thead>

    <tbody>
    
    @foreach ($personajes as $personajes)

        <tr>
            <td>{{$loop->iteration}}</td>   
            <td>
            <img src="{{asset('storage').'/'.$personajes->Foto}}" class="img-thumbnail img-fluid" alt="" width="150">
            </td> 
            <td>{{$personajes->Nombre}}  {{$personajes->Apellido}}</td> 
            <td>{{$personajes->Correo}}</td>
            <td>
            <img src="{{asset('storage').'/'.$personajes->Archivo}}" alt="" width="150">
            </td> 
            
            <td>
            
            <a class="btn btn-warning" href="{{url('/personajes/'.$personajes->id.'/edit') }}">
            Editar
            </a>
            <form method="post" action="{{url('/personajes/'.$personajes->id)}}" style="display:inline">
            {{csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" type="submit" onclick="return confirm('Borrar?');">Borrar</button>

            </form>

            </td>
        </tr>
        
    @endforeach
    

    </tbody>

</table>



</div>
@endsection
