@extends('admin.layout.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=#">{{ __('common.logo') }}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            {{ Form::open(['route' => 'admin.login']) }}
                <div class="form-group has-feedback {{ has_error('email', $errors) }}">
                    {!! Form::email('email', old('email'), [
                    'placeholder' => 'Email',
                    'class' => 'form-control',
                ]) !!}
                    <span class="error help-block">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group has-feedback {{ has_error('password', $errors) }}">
                    {!! Form::input('password', 'password', null, [
                    'placeholder' => 'Password',
                    'class' => 'form-control',
                ]) !!}
                    <span class="error help-block">{{ $errors->first('password') }}</span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                    </div>
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            {{ Form::close() }}
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="redirect/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>
            </div>
            <a href="{{ route('admin.password.forgot') }}">I forgot my password</a><br>
            <a href="{{ route('admin.register') }}">Register a new membership</a>
        </div>
    </div>
@endsection
