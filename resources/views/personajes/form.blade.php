
<div class="form-group">
<label for="Foto" class="control-label">{{'Archivo 1'}}</label>
@if (isset($personajes->Foto))
    <img src="{{asset('storage').'/'.$personajes->Foto}}" class="img-thumbnail img-fluid" alt="" width="150">
@endif
<input required type="file" class="form-control " name="Foto" id="Foto" 
value="{{isset($personajes->Foto)?$personajes->Foto:'' }}">

 </div>



<div class="form-group">
<label for="Archivo" class="control-label">{{'Archivo 2'}}</label>
<input required type="file" class="form-control" name="Archivo" id="Archivo" 
value="{{isset($personajes->Archivo)?$personajes->Archivo:''}}">
</div>




<input type="submit" class="btn btn-success" value="{{ $Modo=='crear'?'Comparar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('/home')}}">Regresar</a>