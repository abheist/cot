@extends('main')

@section('content')

	<div class="well">
		<center>Login</center>
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
			{!! Form::label('email','Email:') !!}
			{!! Form::email('email',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Passsword:') !!}
			{!! Form::password('password',['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Login',['class'=>'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}
	
@stop