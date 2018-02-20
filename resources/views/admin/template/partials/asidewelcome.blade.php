 	    	<div class="panel panel-default panel-info">
			  <div class="panel-heading">Categorias</div>
			  <div class="panel-body">
				    <ul class="list-group">
				      @foreach ($categories as $category)
				      	<li class="list-group-item"><span class="badge">{{$category->articles->count()}}</span>
				      		<a href="{{ route('welcome.search.category',$category->name) }}">{{$category->name}}</a>
				      	</li>
				      	
				      @endforeach
					</ul>
			  </div>
			</div>

			<div class="panel panel-default panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tags</h3>
			  </div>
			  <div class="panel-body">
			    @foreach ($tags as $tag)
			    	<a href="{{ route('welcome.search.tag',$tag->name) }}">
			    		<span class="label label-primary"><i class="fa fa-tag" aria-hidden="true"></i>{{$tag->name}}</span>
			    	</a>
			    @endforeach
			  </div>
			</div>