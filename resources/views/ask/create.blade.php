@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ask Question</div>
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
                        {{ $errors->first('tag1')}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button title="Add Tag" id="addtag" type="button" class="btn btn-sm btn-info">
                                  <span class="glyphicon glyphicon-plus"></span>
                                </button>
                                 <button title="Delete Tag" id="deltag" type="button" class="btn btn-sm btn-danger">
                                  <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </div>
                        </div>

                        <div class="form-group" id="askbtn">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                  Ask
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