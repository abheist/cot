@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{ $question->question }}</h3></div>
                <div class="panel-body">
                   
                {{ Form::open(array('method' => 'POST', 'route' => ['answers.store',$question], 'class' => 'form-horizontal')) }}
                 

                        <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Answer</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="answer" value="{{ old('answer') }}">
                                </textarea>
                                @if ($errors->has('answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                  Submit Answer
                                </button>

                            </div>
                        </div>
{{ Form::close() }}                </div>
            </div>
        </div>
    </div>
</div>
@endsection
