<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title','Default') {{--yield sirve para crear secciones para luego rellenar --}}Panel de Administracion</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome/css/font-awesome.min.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<script type="text/javascript" src="{{ asset('plugins/jquery/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
	
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script-->


	
</head>
<body>

	<div class="container">
		@include('admin.template.partials.nav')

	<section>
		@include('flash::message')
		<script>
	    	$('#flash-overlay-modal').modal();
		</script>
		@include('admin.template.partials.errors')
	 	@yield('content')
	 </section>
	</div>

	@yield('js')

</body>
</html>