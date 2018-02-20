@extends('admin.template.main')


@section('title','Editar Usuarios')


@section('content')

	<form method="POST" action="{{route('admin.users.update',$user->id)}}">

		 {{ csrf_field() }}
		 {{ method_field('PUT') }}
		
		<div class="form-group">
			
			<label for="name">Nombre</label>

			<input type="text" name="name" placeholder="Nombre" class="form-control" required="required" value="{{ $user->name}}">


		</div>

		<div class="form-group">

			<label for="email">Email</label>

			<input type="email" name="email" placeholder="Email" class="form-control" required="required" value="{{ $user->email}}">
			

		</div>


		<div class="form-group">
			
			<label for="type">Tipo de Usuario</label>
			
			<select name="type" required class="form-control">
				<option value="">Seleccione una opcion...</option>
				@if ($user->type === "member")
					<option value="member" selected>Miembro</option>
					<option value="admin">Administrador</option>
				@else
					<option value="member">Miembro</option>
					<option value="admin" selected>Administrador</option>
				@endif
				
				
			</select>


		</div>

		<div class="form-group">

			<input type="submit" name="Actualizar" class="btn btn-primary" value="Actualizar">
			
			
		</div>

	</form>

@endsection