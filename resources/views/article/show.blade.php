@extends('layouts.app')

@section('title')
    Articles - CotBlog
@endsection

@section('navbar')
<ul class="nav navbar-nav">
    <li ><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('about') }}">About</a></li>
	@if(Auth::check())
	    <li><a href="{{ route('users.show',Auth::id()) }}">Dashboard</a></li>
	    <li><a href="{{ route('ask.create') }}">Create</a></li>
		<li class="active"><a href="{{ route('blog.show') }}">Blogs</a></li>
	    <li><a href="{{ route('tags.all') }}">See All Tags</a></li>
	@endif
</ul>
@endsection

@section('content')
<div class="container spark-screen">
<a href="{{ route('article.create',Auth::user()->blog->id)}}" class="btn btn-warning pull-right">Create Article</a>
<hr/>
 @foreach($articles as $article)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a style="text-decoration: none;" href="#"><h4>{{ $article->title }}</h4></a>
                        <small> {{ date_format($article->created_at, 'g:i A \o\n l jS F Y') }} </small>
                    </div>
                    <div class="panel-body">
                        <div class="well clearfix">
                            {{ $article->body }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
