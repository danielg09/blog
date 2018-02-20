@extends('admin.template.main')


@section('title','Crear Tags')


@section('content')

	<form method="POST" action="{{route('admin.tags.store')}}">

		{{ csrf_field() }}
		
		<div class="form-group">
			
			<label for="name">Nombre</label>

			<input type="text" name="name" placeholder="Nombre" class="form-control" required="required">


		</div>


		<div class="form-group">

			<input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
			
			
		</div>

	</form>

@endsection