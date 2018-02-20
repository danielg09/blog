@extends('admin.template.main')


@section('title','Editar Articulos')


@section('content')

	<form method="POST" action="{{route('admin.images.update',$image->id)}}"  enctype="multipart/form-data">

		{{ csrf_field() }}
		{{ method_field('PUT') }}
		

		<a href="#" class="thumbnail"><img src="{{ url('/') . $image->name }}" alt="..."></a>

		<div class="form-group">
	    	<label for="image">Imagen</label>
	  		<input required type="file" name="image">
	    </div>


		<div class="form-group">

			<input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
			
			
		</div>

	</form>

@endsection