<div class="form-group">
    {{ Form::label('name','Nombre del Usuario') }}
     {{ Form::text('name',null,['class'=>'form-control','id'=>'name','required'=>'required']) }}
</div>
<div class="form-group">
    {{ Form::label('email','Email del Usuario') }}
     {{ Form::text('email',null,['class'=>'form-control','id'=>'name','required'=>'required']) }}
</div>
<hr>
<h3>Lista de Roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($roles as $role)
        <li>
            <label>
                {{ Form::checkbox('roles[]', $role->id,null)}}
                {{$role->name}}
                <em>({{ $role->description ?: 'N/A'}})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
     <a class="btn btn-sm btn-primary" href="{{url('/users')}}">Regresar</a>
</div>