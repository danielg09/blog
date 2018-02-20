@extends('admin.template.main')


@section('title','Lista de  Tags')


@section('content')
	<a href="{{ route('admin.tags.create') }}" class="btn btn-info">Regisrar Nuevo</a> 

	<!--Buscador de tags-->

	<form method="GET" action="{{route('admin.tags.index')}}" class="navbar-form pull-right" role="search">
		<div class="form-group">
		    <input type="text" class="form-control" placeholder="Search" name="name">
	  </div>
	  <button type="submit" class="btn btn-default">Buscar</button>
	</form>

	<hr>
	 	
	<table class="table">
		
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>
			
			@foreach($tags as $tag)
				<tr>
					 <td>{{ $tag->id}}</td> 
					 <td>{{ $tag->name}}</td> 
					 <td><a href="{{ route('admin.tags.destroy',$tag->id)}}" class="btn btn-danger" onclick="return confirm('¿Seguro que desas eliminarlo?')">Eliminar</a> 
					 <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning">Actualizar</a></td>  
				 </tr>
			@endforeach

		</tbody>


	</table>

	{{ $tags->links() }}

@endsection