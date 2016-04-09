@extends('layouts.app')

@section('title')
    Want Answers - CotQuora
@endsection

@section('content')
    <div class="container spark-screen">
            <span class="glyphicon glyphicon-bookmark"></span>&nbsp;{{ count($questions) }} Question(s)
        <hr>
        @foreach($questions as $question)
                <div class="well clearfix">
                 <a href="{{route('questions.show',$question->id)}}">{{ $question->question}}</a>
                
                 {{ Form::open(array('route'=>array('users.wantanswers.destroy',$question->id), 'method' => 'delete')) }}
               
                 <button type="submit" class="pull-right btn btn-danger">Remove</button>

                 {{ Form::close() }}

                </div>
            @endforeach

    </div>
@endsection


