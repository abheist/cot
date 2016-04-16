@extends('layouts.app')

@section('title')
    404 - CotQuora
@endsection

@section('content')

	<div class="container jumbotron">
		<center><img src="404new.png">
		<div>
	We could not find the page you are looking for.<br/>
	<a href="{{ route('home')}}">Back to home</a>
	</div></center>
</div>


@endsection