@extends('admin.template.main')


@section('title','Crear Articulos')


@section('content')

	<form method="POST" action="{{route('admin.articles.store')}}"  enctype="multipart/form-data">

		{{ csrf_field() }}
		
		<div class="form-group">
			
			<label for="title">Titulo</label>

			<input type="text" name="title" placeholder="Titulo" class="form-control" required="required">

		</div>

		<div class="form-group">

			<label for="category">Categoria</label>
			
			<select name="category" required class="form-control select-category">
				<option value="">Seleccione una opcion...</option>
				@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
			</select>

		</div>	

		<div class="form-group">
			 
			<label for="content">Contenido</label>

			<textarea type="text" name="content" class="form-control article-content" rows="6" required="required"></textarea>

		</div>

		<div class="form-group">

			<label for="tags">Tags</label>
			
			<select multiple name="tags[]" required class="form-control select-tag">
				@foreach($tags as $tag)
					<option value="{{$tag->id}}">{{$tag->name}}</option>
				@endforeach
			</select>

		</div>	

		<div class="form-group">
	    	<label for="image">Imagen</label>
	  		<input required type="file" name="image">
	    </div>


		<div class="form-group">

			<input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
			
			
		</div>

	</form>

@endsection

@section('js')
	<script>
		$('.select-tag').chosen({
			placeholder_text_multiple:'Seleccione un maximo de 3 tags',
			max_selected_options:3,
			no_results_text:'No se encontraron tags'
		});

		$('.select-category').chosen({
			no_results_text:'No se encontraron categorias'
		});
		$('.article-content').trumbowyg();
	</script>
@endsection

