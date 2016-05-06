@extends('layouts.app')
@section('title')
    Ask Question - CotQuora
@endsection
@section('navbar')
<ul class="nav navbar-nav">
    <li ><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('about') }}">About</a></li>
    @if(Auth::check())
        <li><a href="{{ route('users.show',Auth::id()) }}">Dashboard</a></li>
        <li class="active"><a href="{{ route('ask.create') }}">Create</a></li>
        <li ><a href="{{ route('blog.show') }}">Blogs</a></li>
        <li><a href="{{ route('tags.all') }}">See All Tags</a></li>
    @endif
</ul>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Ask Question</div>
                <div class="panel-body">
                   
                {{ Form::open(array('method' => 'POST', 'route' => 'ask.store', 'class' => 'form-horizontal')) }}
                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="question" >{{ old('question') }}
                                </textarea>
                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-8">
                                <button type="button" title="Add Tag" id="addtag" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                                    <i class="material-icons">add</i>
                                </button>
                                <button type="button" title="Delete Tag" id="deltag" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                                    <i class="material-icons">delete</i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="checkbox" name="anonymous" value="1"></input>Ask As Anonymous
                            </div>
                        </div>
                        <div class="form-group" id="askbtn">
                            <div class="col-md-6 col-md-offset-4">
                                <button title="Add Question" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Add Question
                                </button>
                            </div>
                        </div>
               {{ Form::close() }}        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection