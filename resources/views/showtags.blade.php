@extends('layouts.app')

@section('title')
    Home - CotQuora
@endsection

@section('content')
<div class="container spark-screen">
    <h3>Topics to Follow: </h3>
    <hr/>

   @foreach($tags as $tag)
        <div class="well">
        <a href="{{route('tags.show',$tag->id) }}">
            <span class="glyphicon glyphicon-tag"></span>&nbsp;{{ $tag->name }}
        </a>
        @if(in_array(Auth::id(), array_column($tag->followers->toArray(),"id")))
        <span class="pull-right"> <a class="btn btn-primary btn-xs" href="{{ route('tag.unfollow',$tag->id) }}"> Unfollow <span class="badge">{{ count($tag->followers) }} </span> </a></span>
        @else
        <span class="pull-right"> <a class="btn btn-primary btn-xs" href="{{ route('tag.follow',$tag->id) }}">Follow <span class="badge">{{ count($tag->followers) }} </span></a></span>
        @endif
        </div>
    @endforeach
</div>
@endsection
