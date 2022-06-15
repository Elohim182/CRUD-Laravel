<h1> {{ $modo }} empleado </h1>

@if(count($errors)>0)
	<div class="aler alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)
				<li> {{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="form-group">
	<label for="Nombre"> Nombre </label>
	<input class="form-control" type="text" value="{{isset($empleado->nombre)?$empleado->nombre:old('Nombre')}}" name="Nombre" id="Nombre">

</div>

<div class="form-group">
	<label for="ApellidoPaterno"> ApellidoPaterno </label>
	<input class="form-control" type="text" value="{{isset($empleado->apellidoPaterno)?$empleado->apellidoPaterno:old('ApellidoPaterno')}}" name="ApellidoPaterno" id="ApellidoMaterno">

</div>

<div class="form-group">
	<label for="ApellidoMaterno"> ApellidoMaterno </label>
	<input class="form-control" type="text" value="{{isset($empleado->apellidoMaterno)?$empleado->apellidoMaterno:old('ApellidoMaterno')}}" name="ApellidoMaterno" id="ApellidoPaterno">

</div>

<div class="form-group">
	<label for="Correo"> Correo </label>
	<input class="form-control" type="text" value="{{isset($empleado->correo)?$empleado->correo:old('Correo')}}" name="Correo" id="Correo">

</div>

<div class="form-group">
	<label for="Foto"></label>
	@if(isset($empleado->foto))
	<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$empleado->foto}}" width="100" alt="">
	@endif
	<input class="form-control" type="file" value="" name="Foto" id="Foto">

</div>

<input id="myform" class="btn btn-success" type="submit" value="{{$modo}} datos">
<a class="btn btn-primary" href="{{ url('empleado/') }}">Regresar</a>