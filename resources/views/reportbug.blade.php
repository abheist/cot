@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Report a Bug</div>
                <div class="panel-body">
                   
                {{ Form::open(array('method' => 'POST', 'route' => 'addbug', 'class' => 'form-horizontal')) }}
                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="description" >{{ old('description') }}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group" >
                            <div class="col-md-6 col-md-offset-4">
                                <button title="Report a Bug" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Submit
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