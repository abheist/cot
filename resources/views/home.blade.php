@extends('layouts.app')

@section('title')
    Home - CotQuora
@endsection

@section('content')
<div class="container spark-screen">
    
   @foreach($questions as $question)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $question->question }}</h3>
                        <a target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('user',$question->user->id) }}> <img src="profile_default.png" class="img-circle" width="30" height="30">
                         <span class="label label-info">{{ $question->user->fname }} {{ $question->user->lname }} </span></a> <br/>
                        <small> {{ date_format($question->created_at, 'g:i A \o\n l jS F Y') }} </small>
                    </div>

                    <div class="panel-body">
                      @if(count($question->answers))
                        @foreach($question->answers as $answer)
                            <div class="well">
                            <a target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('user',$answer->user->id) }}> <img src="profile_default.png" class="img-circle" width="30" height="30">
                         <span class="label label-info">{{ $answer->user->fname }} {{ $answer->user->lname }} </span></a> <br/>
                               
                                {{ $answer->answer }} 
                            </div>
                        @endforeach
                      @else
                        No Answers Available
                    @endif
                       <a href="{{ route('answer',$question->id) }}" class="btn btn-info">Answer</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
