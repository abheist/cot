@extends('layouts.app')
@section('title')
    Add Bio - CotQuora
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Add Bio</div>
                <div class="panel-body">
                   
                {{ Form::model($user,array('method' => 'patch', 'route' => array('user.updatebio',$user),  'class' => 'form-horizontal')) }}
                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Bio</label>
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
                                <button title="Add Bio" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Add Bio
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