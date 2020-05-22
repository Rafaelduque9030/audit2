@extends('layouts.app')

@section('content')


<div class="container">

@if (count($errors)>0)
<div class="alert alert-danger" role="alert">

<ul>
@foreach ($errors->all() as $errors)
    <li> {{$errors}} </li>
@endforeach
</ul>

</div>
@endif



Seccion Para Comparar
<form action="{{route('personajes.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

@include('personajes.form',['Modo'=>'crear'])



</form>

</div>
@endsection