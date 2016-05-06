@extends('layouts.app')

@section('title')
    Home - CotQuora
@endsection

@section('navbar')
<ul class="nav navbar-nav">
    <li class="active"><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('about') }}">About</a></li>
    @if(Auth::check())
        <li><a href="{{ route('users.show',Auth::id()) }}">Dashboard</a></li>
        <li><a href="{{ route('ask.create') }}">Create</a></li>
        <li ><a href="{{ route('blog.show') }}">Blogs</a></li>
        <li><a href="{{ route('tags.all') }}">See All Tags</a></li>
    @endif
</ul>
@endsection


@section('content')
<div class="container spark-screen">
<h3> Based on the tags and users you follow </h3>
<hr/>
   @foreach($questions as $question)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a style="text-decoration: none;" href="{{route('questions.show',$question->id)}}"><h4>{{ $question->question }}</h4></a>
                        @if(!count($question->answers))
                            @if(!in_array($question->id,$wids))
                                <a class="btn btn-link btn-xm" href="{{ route('questions.follow',$question->id) }}"> Want Answer</a>
                            @else
                               <a class="btn btn-link btn-xs disabled" href="{{ route('questions.follow',$question->id) }}"> Want Answer <span class="badge"> {{ count($question->followers)  }} </span></a>
                            @endif
                                <br/>
                        @endif
                        
                        @if(!$question->anonymous)
                            <a target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$question->user->id) }}> <img src="profile_default.png" class="img-circle" width="30" height="30">
                            <span class="label label-info">{{ $question->user->fname }} {{ $question->user->lname }} </span></a> 
                        @else
                             <span class="label label-info">Anonymous </span>
                        @endif
                        

                         <br/>
                        <small> {{ date_format($question->created_at, 'g:i A \o\n l jS F Y') }} </small>
                    </div>

                    <div class="panel-body">
                      @if(count($question->answers))
                        @foreach($question->answers as $answer)
                            <div class="well clearfix">
                            <a target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$answer->user->id) }}> <img src="profile_default.png" class="img-circle" width="30" height="30">
                         <span class="label label-info">{{ $answer->user->fname }} {{ $answer->user->lname }} </span></a> <br/>
                               <small> {{ date_format($answer->created_at, 'g:i A \o\n l jS F Y') }} </small>      <br/>
                                {{ $answer->answer }} 
                                <br/>
                                 
                                @if(!in_array($answer->id,$user_bookmarks))
                                    <a title="Add to Reading List" class="pull-right btn btn-xs btn-primary" href="{{ route('answers.bookmark',$answer->id)}}"><i class="fa fa-bookmark" aria-hidden="true"></i>
</a>
                                @else
                                    <a title="View Bookmarks" class="pull-right btn btn-xs btn-success" href="{{route('users.bookmarks.show')}}"><i class="fa fa-bookmark" aria-hidden="true"></i>
</a>
                                @endif

                            </div>
                        @endforeach
                      @else
                        No Answers Available
                        <a href="{{ route('answers.create',$question->id) }}" class="btn btn-info">Answer</a>
                    @endif
                    </div>
                    <div class="panel-footer">
                        <span class="glyphicon glyphicon-tags"></span>&nbsp;
                        @if(!count($question->tags))
                            No Tags Available
                        @endif
                        @foreach($question->tags as $tag)
                         <a href="{{ route("tags.show",$tag->id) }}" class="btn btn-success btn-xs">
                           {{ $tag->name }}
                        </a>
                           
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
