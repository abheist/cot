@extends('layouts.app')

@section('title')
    Want Answers - CotQuora
@endsection

@section('content')
    <div class="container spark-screen">
            <span class="glyphicon glyphicon-bookmark"></span>&nbsp;{{ count($questions) }} Question(s)
        <hr>
        @foreach($questions as $question)
                <div class="well">
                 <a href="{{route('questions.show',$question->id)}}">{{ $question->question}}</a>
                </div>
            @endforeach

    </div>
@endsection


