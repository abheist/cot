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
        </div>
    @endforeach
</div>
@endsection
