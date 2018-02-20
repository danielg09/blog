@extends('admin.template.main')

@section('title','Lista de  Imagenes')


@section('content')

 <div class="row">
 	
		@foreach ($images as $image)


			<div class="col-md-4">

				<div class="panel panel-default">
				  <div class="panel-body">
				    <img class="img-responsive img-rounded" width="40%" src="{{ url('/') . $image->name }}">
				  </div>
				  <div class="panel-footer">
				  	{{ $image->article->title }}
					<a href="{{ route('admin.images.edit', $image->id) }}" class="btn btn-warning">Actualizar Imagen</a></td>  
				  </div>
				</div>
			</div>


		@endforeach

 </div>


    {{ $images->links() }}

@endsection