@extends('main')

@section('title')
	EDIT PROFILE
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
	
	{{ Form::model($user->profile,[ 'method' => 'PATCH', 'route' => ['profile.update',$user->id]])}}

		{{ Form::label('location','Location:') }}
		{{ Form::text('location',null,['class' => '']) }}

		<br/>

		{{ Form::label('bio','Bio:') }}
		{{ Form::textarea('bio',null,['class' => '']) }}

		<br/>

		{{ Form::label('twiiter_username','Twitter Username:') }}
		{{ Form::text('twitter_username',null,['class' => '']) }}

		{{ Form::label('facebook_username','Facebook Username:') }}
		{{ Form::text('facebook_username',null,['class' => '']) }}

		{{ Form::label('github_username','Github Username:') }}
		{{ Form::text('github_username',null,['class' => '']) }}

		{{ Form::submit('Update Profile',['class'=>'']) }}

	{{ Form::close() }}
@stop