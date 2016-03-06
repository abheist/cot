@extends('layouts.app')

@section('title')
    Home - CotQuora
@endsection

@section('content')
    <div class="container spark-screen">
        <a href="tags/{{ $tag->id }}" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-tag"></span>&nbsp;{{ $tag->name }}
        </a>
        <hr>
    @foreach($tag->questions as $question)
        <div class="well"> 
           <a href="{{route('questions.show',$question->id)}}"> {{ $question->question }} </a>
        </div>
    @endforeach

    </div>
@endsection
