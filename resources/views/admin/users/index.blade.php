@extends('admin.template.main')


@section('title','Lista de  Usuarios')


@section('content')
	<a href="{{ route('admin.users.create') }}" class="btn btn-info">Regisrar Nuevo</a> 
	<table class="table">
		
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Email</th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>
			
			@foreach($users as $user)
				<tr>
					 <td>{{ $user->id}}</td> 
					 <td>{{ $user->name}}</td> 
					 <td>{{ $user->type}}</td>
					 <td>{{ $user->email}}</td>
					 <td><a href="{{ route('admin.users.destroy',$user->id)}}" class="btn btn-danger" onclick="return confirm('¿Seguro que desas eliminarlo?')">Eliminar</a> 
					 <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Actualizar</a></td>  
				 </tr>
			@endforeach

		</tbody>


	</table>

	{{ $users->links() }}

@endsection
