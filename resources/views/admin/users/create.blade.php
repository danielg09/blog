@extends('admin.template.main')


@section('title','Crear Usuarios')


@section('content')

	<form method="POST" action="{{route('admin.users.store')}}">

		 {{ csrf_field() }}
		
		<div class="form-group">
			
			<label for="name">Nombre</label>

			<input type="text" name="name" placeholder="Nombre" class="form-control" required="required">


		</div>

		<div class="form-group">

			<label for="email">Email</label>

			<input type="email" name="email" placeholder="Email" class="form-control" required="required">
			

		</div>

		<div class="form-group">

			<label for="password">Password</label>

			<input type="password" name="password" placeholder="Password" class="form-control" required="required">
			

		</div>

		<div class="form-group">
			
			<label for="type">Tipo de Usuario</label>
			
			<select name="type" required class="form-control">
				<option value="">Seleccione una opcion...</option>
				<option value="member">Miembro</option>
				<option value="admin">Administrador</option>
			</select>


		</div>

		<div class="form-group">

			<input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
			
			
		</div>

	</form>

@endsection