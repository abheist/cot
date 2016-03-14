@extends('layouts.app')

@section('title')
    Bookmarks - CotQuora
@endsection

@section('content')
    <div class="container spark-screen">
            <span class="glyphicon glyphicon-bookmark"></span>&nbsp;{{ count($bookmarks->bookmarks) }} Bookmarks
        <hr>
    		@foreach($bookmarks->bookmarks as $bookmark)
    			<div class="well">
    			 {{ $bookmark->answer }}
    			</div>
    		@endforeach

    </div>
@endsection


