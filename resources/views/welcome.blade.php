@extends('admin.template.main')

@section('title','Pagina de Inicio ')


@section('content')


<div class="container-fluid">

  <div class="row">

    	<div class="col-md-8">    		
			<div class="row">
			  @foreach ($articles as $article)
			  	<div class="col-md-6">
				  	<div class="panel panel-default">
					  <div class="panel-body">
					    <a href="{{ route('welcome.view.article',$article->slug) }}" class="thumbnail"><img src="{{ url('/') . $article->images[0]->name }}" alt="..."></a>
					     <a href="{{ route('welcome.view.article',$article->slug) }}" class="thumbnail"><h3 class="text-center">{{ $article->title }}</h3></a>
					  </div>
					  <div class="panel-footer"><i class="fa fa-folder-open-o" aria-hidden="true"></i><a href="{{ route('welcome.search.category',$article->category->name) }}"> {{$article->category->name}}</a> | <i class="fa fa-user" aria-hidden="true"></i>
					  By: {{ $article->user->name }} | <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $article->created_at->diffForHumans() }}</div>
					</div>
				 </div>
			  @endforeach

			</div>   		
    	</div>

 	    <div class="col-md-4">
 	    
 	    	@include('admin.template.partials.asidewelcome')

 	    </div>

  </div>

</div>

{{ $articles->links() }}

@endsection