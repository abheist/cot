@extends('layouts.app')

@section('title')
    {{ $tag->name }} - CotQuora
@endsection

@section('content')
    <div class="container spark-screen">
        <a href="{{route('tags.show',$tag->id) }}" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-tag"></span>&nbsp;{{ $tag->name }}
        </a>
       
        
        @if(!$follow)
            <a class="btn btn-primary btn-xs" href="{{ route('tag.follow',$tag->id) }}">Follow <span class="badge">{{ count($tag->followers) }} </span></a>
        @else
            <a class="btn btn-primary btn-xs" href="{{ route('tag.unfollow',$tag->id) }}"> Unfollow <span class="badge">{{ count($tag->followers) }} </span> </a>
        @endif
        <hr>
    @foreach($tag->questions as $question)
        <div class="well"> 
           <a href="{{route('questions.show',$question->id)}}"> {{ $question->question }} </a>
        </div>
    @endforeach

    </div>
@endsection
