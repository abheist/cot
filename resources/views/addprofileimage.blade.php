@extends('layouts.app')
@section('title')
    Change Profile Picture - CotQuora
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Change Profile Picture</div>
                <div class="panel-body">
                   
                {{ Form::model($user,array('method' => 'patch', 'route' => array('user.addprofileimage',$user),  'class' => 'form-horizontal', 'files' =>true )) }}

                      <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">    
                            {{ Form::label('image','Choose an image',['class' => 'col-md-4 control-label' ])}}
                            <div class="col-md-6">
                               {!! Form::file('image',['accept' => 'image/*']) !!}
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                            </div>
                        </div>
                   
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button title="Change Image" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                   Change Image
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