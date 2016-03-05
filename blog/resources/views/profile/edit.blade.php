@extends('main')

@section('title')
	EDIT PROFILE
@stop

@section('head')

{{ Html::style('css/profile.css') }}

@stop

@section('content')
	Edit Profile

	@if($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)

				<li> {{ $error }} </li>
			@endforeach
		</ul>
	@endif
	
	{{ Form::model($logInUser->profile,[ 'method' => 'PATCH', 'action' => ['userController@update', $logInUser->user_name],'enctype'=> 'multipart/form-data']) }}


		<div class="form-group">
		{{ Form::label('website','Website:') }}
		{{ Form::text('website',null,['class' => 'form-control']) }}
		</div>

		<div class="form-group">
		{{ Form::label('tagline','Tagline:') }}
		{{ Form::text('tagline',null,['class' => 'form-control']) }}
		</div>


		<div class="form-group">
		{{ Form::label('location','Location:') }}
		{{ Form::text('location',null,['class' => 'form-control']) }}
		</div>

		<div class="form-group">
		{{ Form::label('bio','Bio:') }}
		{{ Form::textarea('bio',null,['class' => 'form-control']) }}
		</div>
		

		<div class="form-group">
		{{ Form::label('github','Github Username:') }}
		{{ Form::text('github',null,['class' => 'form-control']) }}
		</div>

		<div class="form-group">
		{{ Form::label('linkedin','Linkedin Username:') }}
		{{ Form::text('linkedin',null,['class' => 'form-control']) }}
		</div>

		<div class="form-group">
		{{ Form::label('resume','Resume:') }}
		{{ Form::input('file','resume',null,['class' => 'form-control']) }}
		</div>

		<div class="form-group">
		{{ Form::label('profile_pic','Profile Picture:') }}
		{{ Form::input('file','profile_pic',null,['class' => 'form-control']) }}
		</div>

		{{ Form::submit('Update Profile',['class'=>'btn btn-primary']) }}

	{{ Form::close() }}
@stop