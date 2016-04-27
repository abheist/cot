@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <h3>People you Follow: </h3>
    <hr/>

   @foreach(Auth::user()->following as $user)
        <div class="well">
        <a href="{{route('users.show',$user->id)}}">
            &nbsp;{{ $user->fname }} {{ $user->lname }}
        </a>
        
        </div>
    @endforeach
</div>
@endsection