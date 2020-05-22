<div class="form-group">
    {{ Form::label('name','Nombre del Usuario') }}
     {{ Form::text('name',null,['class'=>'form-control','id'=>'name','required'=>'required']) }}
</div>
<div class="form-group">
    {{ Form::label('slug','URL Amigable') }}
     {{ Form::text('slug',null,['class'=>'form-control','id'=>'name','required'=>'required']) }}
</div>
<div class="form-group">
    {{ Form::label('description','Descripcion') }}
    {{ Form::textarea('description',null,['class'=>'form-control','id'=>'name','required'=>'required']) }}
</div>
<hr>
<h3>Permiso Especial<h3>
<div class="form-group">
    <label>{{ Form::radio('special','all-access')}} Acceso Total</label><br>
    <label>{{ Form::radio('special','no-access')}} Ningun Acceso</label>
</div>
<hr>
<h3>Lista de Permisos</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($permissions as $permission)
        <li>
            <label>
                {{ Form::checkbox('permissions[]', $permission->id,null)}}
                {{$permission->name}}
                <em>({{ $permission->description ?: 'N/A'}})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
     <a class="btn btn-sm btn-primary" href="{{url('/roles')}}">Regresar</a>
</div>