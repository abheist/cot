@extends('main')

@section('title')
    REGISTER 
@stop


@section('content')


	<div class="well">
		<center>Register</center>
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
			{!! Form::label('fname','First Name:') !!}
			{!! Form::text('fname',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('lname','Last Name:') !!}
			{!! Form::text('lname',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Email:') !!}
			{!! Form::email('email',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Passsword:') !!}
			{!! Form::password('password',['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('cnfrmpassword','Confirm Passsword:') !!}
			{!! Form::password('cnfrmpassword',['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Register',['class'=>'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}


@stop