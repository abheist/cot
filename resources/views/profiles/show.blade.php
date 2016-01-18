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
		<li>{{ link_to('http://facebook.com/'.$user->profile->facebook_username,'Find me on Facebook')}}</li>
		<li>{{ link_to('http://twiiter.com/'.$user->profile->twitter_username,'Follow me on Twitter')}}</li>
		<li>{{ link_to('http://github.com/'.$user->profile->github_username,'View my work on Facebook')}}</li>

	</div>

	@if(Auth::check() && (Auth::user()->id == $user->id))
		{{ link_to_route('profile.edit','Edit Your Profile',$user->id) }}
	@endif
@stop