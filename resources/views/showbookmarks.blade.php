@extends('layouts.app')

@section('title')
    Bookmarks - CotQuora
@endsection

@section('content')
    <div class="container spark-screen">
            <span class="glyphicon glyphicon-bookmark"></span>&nbsp;{{ count(Auth::user()->bookmarks) }} Bookmark(s)
        <hr>
        @foreach(Auth::user()->bookmarks as $bookmark)
                <div class="well">
                 {{ $bookmark->answer }}
                </div>
            @endforeach

    </div>
@endsection


