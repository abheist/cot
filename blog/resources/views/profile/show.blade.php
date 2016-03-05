@extends('main')

@section('title')
	PROFILE
@stop

@section('content')
	<h1>Profile</h1>
	{{ $user->fname}} {{$user->lname}} |
	<small>{{ $user->profile->location}}</small>
	<div>
		{{ $user->profile->bio}}
	</div>
	<div>

	</div>

	@if(Auth::check() && (Auth::user()->id == $user->id))
		{{ link_to_route('profile.edit','Edit Your Profile',$user->id) }}
	@endif
@stop