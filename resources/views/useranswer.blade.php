@extends('layouts.app')

@section('title')
    {{ $user->fname }} {{ $user->lname }} - CotQuora
@endsection

@section('content')
<div class="container spark-screen">
    
    <div class="container">
       <div class="col-md-2">
            <img src="../profile_default.png" class="img-circle" alt="Profile Pic" height="150">
        </div>
        <div class="col-md-10">

            <h3>{{ $user->fname }} {{ $user->lname }}</h3>
            <br/>
            @if($user->id!=Auth::id())
                @if($follow==0)
                     <a href="{{route('users.follow',$user->id)}}" class="btn btn-primary">
                        Follow
                    </a>
                @else
                 <a href="{{route('users.follow',$user->id)}}" class="btn btn-primary disabled">
                        Following
                        </a>
                @endif
            @endif
             

        </div>

    </div>
    <hr>
    <div class="well col-md-10 col-md-offset-1">
        <a href= {{ route('users.questions.show',$user->id)}} > Questions </a> | <a href= {{ route('users.show',$user->id)}} > Answers </a>
    </div>
    @if(!count($answers))
        <div class="container">
       <div class="col-md-12">
            <center><h3>{{ $user->fname }} has not answered any question yet.</h3></center>
        </div>
    </div>
    @endif
     @foreach($answers as $answer)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <a href="{{route('questions.show',$answer->question->id)}}">  <h3>{{ $answer->question->question }}</h3></a>
                      
                        <a  target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$answer->question->user->id) }}> <img src="../profile_default.png" class="img-circle" width="30" height="30">
                         <span class="label label-info">{{ $answer->question->user->fname }} {{ $answer->question->user->lname }} </span></a> <br/>
                        <small> {{ date_format($answer->question->created_at, 'g:i A \o\n l jS F Y') }} </small>
                    </div>

                     <div class="panel-body">
                            <div class="well">
                            <a target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$answer->question->user->id) }}> <img src="../profile_default.png" class="img-circle" width="30" height="30">
                         <span class="label label-info">{{ $answer->user->fname }} {{ $answer->user->lname }} </span></a> <br/>
                          <small> {{ date_format($answer->created_at, 'g:i A \o\n l jS F Y') }} </small><br/>
                               
                                <p>{{ $answer->answer }} </p>
                            </div>
                     
                       <a href="{{ route('answers.create',$answer->question->id) }}" class="btn btn-info">Answer</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
