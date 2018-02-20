<!DOCTYPE html>
<html>
<head>
	<title>Error</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ asset('plugins/jquery/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	
	<style type="text/css">
		.error{
			vertical-align: middle;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="error">
		<h2 class="">No tiene permisos suficientes para acceder a este modulo</h2>
		<a class="" href="{{route('admin')}}">Click aquí para regresar al panel de aministracion</a>
	</div>
</body>
</html>