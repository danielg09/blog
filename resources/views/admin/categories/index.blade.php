@extends('admin.template.main')


@section('title','Lista de  Categorias')


@section('content')
	<a href="{{ route('admin.categories.create') }}" class="btn btn-info">Regisrar Nuevo</a> 
	<table class="table">
		
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>
			
			@foreach($categories as $category)
				<tr>
					 <td>{{ $category->id}}</td> 
					 <td>{{ $category->name}}</td> 
					 <td><a href="{{ route('admin.categories.destroy',$category->id)}}" class="btn btn-danger" onclick="return confirm('¿Seguro que desas eliminarlo?')">Eliminar</a> 
					 <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Actualizar</a></td>  
				 </tr>
			@endforeach

		</tbody>


	</table>

	{{ $categories->links() }}

@endsection