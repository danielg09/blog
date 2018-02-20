@extends('admin.template.main')


@section('title','Lista de  Articulos')


@section('content')
	<a href="{{ route('admin.articles.create') }}" class="btn btn-info">Regisrar Nuevo</a> 

	<!--Buscador de articulos-->

	<form method="GET" action="{{route('admin.articles.index')}}" class="navbar-form pull-right" role="search">
		<div class="form-group">
		    <input type="text" class="form-control" placeholder="Search" name="title">
	  </div>
	  <button type="submit" class="btn btn-default">Buscar</button>
	</form>

	<hr>
	<table class="table">
		
		<thead>
			<tr>
				<th>Id</th>
				<th>Titulo</th>
				<th>Categoria</th>
				<th>Usuario</th>
				<th>Imagen</th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>
			
			@foreach($articles as $article)
				<tr>
					 <td>{{ $article->id}}</td> 
					 <td>{{ $article->title}}</td> 
					 <td>{{ $article->category->name}}</td> 
					 <td>{{ $article->user->name}}</td> 
					 <td><img width="80px" src="{{ url('/') . $article->images[0]->name}}"></td> 
					 <td><a href="{{ route('admin.articles.destroy',$article->id)}}" class="btn btn-danger" onclick="return confirm('¿Seguro que desas eliminarlo?')">Eliminar</a> 
					 <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning">Actualizar</a></td>  
				 </tr>
			@endforeach

		</tbody>

	</table>

	{{ $articles->links() }}

@endsection