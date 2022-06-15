@extends('layouts.app')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<script>
	function enviar()
	{
			var formulario = document.getElementById("myform");
			formulario.preventDefault();
			Swal.fire({
		  title: 'Do you want to save the changes?',
		  showDenyButton: true,
		  showCancelButton: true,
		  confirmButtonText: `Confirmar`,
		  denyButtonText: `Cancelar`,
		}).then((result) => {
		  /* Read more about isConfirmed, isDenied below */
		  if (result.isConfirmed) {
		    Swal.fire('Saved!', '', 'success')
		    formulario.currentTarget.submit();
		    formulario.submit();
		  } else if (result.isDenied) {
		    Swal.fire('Changes are not saved', '', 'info')
		    return false;
		  }
		})
	}
</script>

<div class="container">
	<form id="myform" onsubmit="return enviar()" action="{{ url('/empleado/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		{{ method_field('PATCH') }}
		@include('empleado.form',['modo'=>'Editar']);
	</form>
</div>
@endsection