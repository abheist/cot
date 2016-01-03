@extends('app')

@section('content')

	<div class="well well-lg">
		<h3>Recent Blogs</h3>
	</div>

	@foreach($blogs as $blog)
		<div class="well">
			<strong>{{$blog->blog_title}}</strong> <br/>
			By: {{$blog->user->fname}} {{$blog->user->lname}}<br/>
			<span class="badge">
				{{date_format($blog->created_at,'l, H:i A')}} 
			</span><br/>
			{{$blog->blog_body}}
		</div>
	@endforeach
	
@stop