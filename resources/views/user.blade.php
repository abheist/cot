@extends('layouts.app')

@section('title')
    {{ $user->fname }} {{ $user->lname }} - CotQuora
@endsection

@section('content')
<div class="container spark-screen">
    
    <div class="container">
       <div class="col-md-2">
            @if($user->gender=="M")
                <img src="../../profile_default.png" class="img-circle" alt="Profile Pic" height="150">
            @else
                <img src="../../profile_women.png" class="img-circle" alt="Profile Pic" height="150">
            @endif
        </div>
        <div class="col-md-10">
            <h3>{{ $user->fname }} {{ $user->lname }}</h3>
            @if($user->id!=Auth::id())
                @if($follow==0)
                     <a href="{{route('users.follow',$user->id)}}" class="btn btn-primary">
                        Follow
                    </a>
                @else
                    <a href="{{route('users.follow',$user->id)}}" class="btn btn-primary disabled">
                        Following <span class="badge">{{ count($user->followers)}}</span>
                    </a>
                @endif
            @else
                @if(empty($user->bio))
                        <a id="addbio" href="{{ route('user.addbio',$user->id)}}">Add Bio</a>
                @else
                    <h4> {{ $user->bio }} </h4>
                    @endif
            @endif
        </div>
    </div>
    <hr>
   <div class="well col-md-10 col-md-offset-1">
        <a href= {{ route('users.questions.show',$user->id)}} > Questions </a> | <a href= {{ route('users.show',$user->id)}} > Answers </a>
    </div>
    @if(!count($questions))
        <div class="container">
       <div class="col-md-12">
            <center><h3>{{ $user->fname }} has not asked any question yet.</h3></center>
        </div>
    </div>
    @endif
     @foreach($questions as $question)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{route('questions.show',$question->id)}}"><h3>{{ $question->question }}</h3></a>
                        <a  target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$question->user->id) }}> <img src="../../profile_default.png" class="img-circle" width="30" height="30">
                         <span class="label label-info">{{ $question->user->fname }} {{ $question->user->lname }} </span></a> <br/>
                        <small> {{ date_format($question->created_at, 'g:i A \o\n l jS F Y') }} </small>
                    </div>
                    <div class="panel-body">
                        @if(count($question->answers))
                            @if(count($question->answers)>1)
                                {{ count($question->answers) }} Answers
                            @else
                                {{ count($question->answers) }} Answer
                            @endif
                            @foreach($question->answers as $answer)
                                <div class="well">
                                <a target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$question->user->id) }}> <img src="../../profile_default.png" class="img-circle" width="30" height="30">
                             <span class="label label-info">{{ $answer->user->fname }} {{ $answer->user->lname }} </span></a> <br/>
                                   
                                    {{ $answer->answer }} 
                                </div>
                            @endforeach
                          @else
                            No Answers Available
                        @endif
                       <a href="{{ route('answers.create',$question->id) }}" class="btn btn-info">Answer</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
