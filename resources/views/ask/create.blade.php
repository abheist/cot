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
                                <textarea class="form-control" name="question" value="{{ old('question') }}">
                                </textarea>
                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="addtag" type="button" class="btn btn-sm btn-info">
                                  Add Tag
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            
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