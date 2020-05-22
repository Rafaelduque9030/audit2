@extends('layouts.app')

@section('content')


<div class="container">

Seccion Para Editar 
<form action="{{url('/personajes/'.$personajes->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

@include('personajes.form',['Modo'=>'editar'])

<form action="{{route('personajes.store')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}



</form>

</form> 

</div>
@endsection
