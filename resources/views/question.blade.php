@extends('layouts.app')

@section('title')
    Home - CotQuora
@endsection

@section('content')
    <div class="container spark-screen">
     <h3> {{ $question->question}}</h3>
       <a href="{{ route('answers.create',$question->id) }}" class="btn btn-info btn-sm">Answer</a>
   
         <span class="glyphicon glyphicon-tags"></span>&nbsp;
                        @if(!count($question->tags))
                            No Tags Available
                        @endif
                        @foreach($question->tags as $tag)
                         <a href="tags/{{ $tag->id }}" class="btn btn-success btn-xs">
                           {{ $tag->name }}
                        </a>
                           
                        @endforeach
                        
       <hr>

                        @foreach($question->answers as $answer)
                            <div class="well">
                            <a target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$answer->user->id) }}> <img src="../profile_default.png" class="img-circle" width="30" height="30">
                         <span class="label label-info">{{ $answer->user->fname }} {{ $answer->user->lname }} </span></a> <br/>
    <small> {{ date_format($answer->created_at, 'g:i A \o\n l jS F Y') }} </small>      <br/>                        
                                {{ $answer->answer }} 
                            </div>
                        @endforeach

    </div>
@endsection
