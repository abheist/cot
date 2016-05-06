@extends('layouts.app')
@section('title')
    Ask Question - CotQuora
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Create Blog</div>
                <div class="panel-body">
                   
                {{ Form::open(array('method' => 'POST', 'route' => 'blog.store', 'class' => 'form-horizontal')) }}
                        
                         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Blog Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="body" >{{ old('body') }}
                                </textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Bio for Blog</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="bio" >{{ old('bio') }}
                                </textarea>
                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                
                        <div class="form-group"> 
                            <div class="col-md-6 col-md-offset-4">
                                <button title="Create Blog" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                   Create Blog
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