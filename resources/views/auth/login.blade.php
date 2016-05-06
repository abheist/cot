@extends('layouts.app')


@section('title')
    Login - CotQuora
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <center>
    <h2>Welcome to Cotanz College Connect</h2>
    </center>
    <div class="well">
        <h4><strong>Cotanz College Connect</strong> will use social media, video, and other Web-based communications, along with traditional forms of outreach, to connect students to GLA and to other public and private colleges. Users could add people as friends, send them messages, and update their personal profiles to notify friends about themselves.</h4>
    </div>
    <div class="well">
        <h4>Users across GLA will be eligible to claim Cotanz, more secure access to the applications and services you use every day allow only authorized user to access various functions and processes available in system: as in today’s era it’s not safe to have records without any security that is one cannot allow access to everyone. This needs a check so that authorized access is given through the system by facilitating with the passwords so that authorized person can go through it.</h4>
    </div>
    
       <center> <a href="/register"><h3 class="btn btn-primary btn-lg">Join Us Now</h3></a></center>
    <hr/>
</div>
@endsection
