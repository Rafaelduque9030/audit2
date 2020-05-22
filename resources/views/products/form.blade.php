<div class="form-group">
    {{ Form::label('name','Nombre del Archivo') }}
     {{ Form::text('name',null,['class'=>'form-control','id'=>'name','required'=>'required']) }}
</div>
<div class="form-group">
    {{ Form::label('description','Descripcion   del Archivo') }}
     {{ Form::textarea('description',null,['class'=>'form-control','id'=>'name','required'=>'required']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
     <a class="btn btn-sm btn-primary" href="{{url('/products')}}">Regresar</a>
</div>