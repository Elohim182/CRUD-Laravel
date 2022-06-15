@extends('layouts.app')
@section('content')
<div class="container">

	<div class="alert alert-success alert-dismissible" role="alert">
		@if(Session::has('mensaje'))
			{{ Session::get('mensaje') }}
		@endif
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<a class="btn btn-success" href="{{ url('empleado/create') }}">Registrar nuevo empleado</a>
	<br>
	<br>
	<table class="table table-light"> 
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Correo</th>
				<th>Acciones</th>
			<tr>
		</thead>

		<tbody>
			@foreach( $empleados as $empleado )
			<tr>
				<td>{{ $empleado->id }}</td>

				<td>
				<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$empleado->foto}}" width="100" alt="">
				</td>

				<td>{{ $empleado->nombre }}</td>
				<td>{{ $empleado->apellidoPaterno }}</td>
				<td>{{ $empleado->apellidoMaterno }}</td>
				<td>{{ $empleado->correo }}</td>
				<td> 

				<a class="btn btn-warning" href="{{ url('/empleado/'.$empleado->id.'/edit') }}" >
					Editar 
				</a> 
				|
					<form class="d-inline" action="{{ url('/empleado/'.$empleado->id ) }}" method="post">
					@csrf
					{{ method_field('DELETE') }}
						<input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" 
						value="Borrar">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>
	{!! $empleados->links() !!}
</div>
@endsection