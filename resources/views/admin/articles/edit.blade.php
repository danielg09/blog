@extends('admin.template.main')


@section('title','Editar Articulos')


@section('content')

	<form method="POST" action="{{route('admin.articles.update',$article->id)}}"  enctype="multipart/form-data">

		{{ csrf_field() }}
		{{ method_field('PUT') }}
		
		<div class="form-group">
			
			<label for="title">Titulo</label>

			<input type="text" name="title" placeholder="Titulo" class="form-control" required="required" value="{{$article->title}}">

		</div>

		<div class="form-group">

			<label for="category">Categoria</label>
			
			<select name="category" required class="form-control select-category">
				<option value="">Seleccione una opcion...</option>
				@foreach($categories as $category)
					<option value="{{$category->id}}" @if($article->category->name == $category->name) selected @endif>{{$category->name}}</option>
				@endforeach
			</select>

		</div>	

		<div class="form-group">
			 
			<label for="content">Contenido</label>

			<textarea type="text" name="content" class="form-control article-content" rows="6" required="required">
				{{$article->content}}
			</textarea>

		</div>

		<div class="form-group">

			<label for="tags">Tags</label>
			
			<select multiple name="tags[]" required class="form-control select-tag">
				@foreach($tags as $tag)

					<option value="{{$tag->id}}" 

						@foreach ($article->tags as $myTag)
						 	@if($myTag->name == $tag->name) selected @endif
						@endforeach
						
					>{{$tag->name}}</option>
				@endforeach
			</select>

		</div>	

		<!--div class="form-group">
	    	<label for="image">Imagen</label>
	  		<input required type="file" name="image">
	    </div-->


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

