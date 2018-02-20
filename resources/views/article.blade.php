@extends('admin.template.main')

@section('title','Pagina de Inicio')


@section('content')


<div class="container-fluid">

  <div class="row">


    	<div class="col-md-8">  

			<h3>{{$article->title}}</h3>
			{!!$article->content!!}

			<i class="fa fa-folder-open-o" aria-hidden="true"></i><a href="{{ route('welcome.search.category',$article->category->name) }}"> {{$article->category->name}}</a> | <i class="fa fa-user" aria-hidden="true"></i>
					  By: {{ $article->user->name }} | <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $article->created_at->diffForHumans() }}
				
    	</div>

 	    <div class="col-md-4">
 	    
 	    	@include('admin.template.partials.asidewelcome')

 	    </div>
			

  </div>

</div>


@endsection