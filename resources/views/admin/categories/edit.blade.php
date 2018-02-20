@extends('admin.template.main')


@section('title','Editar Categorias')


@section('content')

	<form method="POST" action="{{route('admin.categories.update',$category->id)}}">

		{{ csrf_field() }}
	    {{ method_field('PUT') }}
		
		<div class="form-group">
			
			<label for="name">Nombre</label>

		<input type="text" name="name" placeholder="Nombre" class="form-control" required="required" value="{{ $category->name}}">


		</div>


		<div class="form-group">

			<input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
			
			
		</div>

	</form>

@endsection