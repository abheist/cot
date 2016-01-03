@extends('app')

@section('content')

	<div class="well">
		<center>Create Blog</center>
	</div>

	@if($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)

				<li> {{ $error }} </li>
			@endforeach
		</ul>
	@endif

	
	{!! Form::open() !!}
	
		<div class="form-group">
			{!! Form::label('blog_title','Blog Title:') !!}
			{!! Form::text('blog_title',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('blog_body','Blog Body:') !!}
			{!! Form::textarea('blog_body',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Post',['class'=>'btn btn-primary ']) !!}
		</div>

	{!! Form::close() !!}
	
@stop