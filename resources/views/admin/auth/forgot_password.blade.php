@extends('admin.layout.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=#">{{ __('common.logo') }}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Forgot password</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {{ Form::open(['route' => 'admin.password.send_link']) }}
            <div class="form-group has-feedback {{ has_error('email', $errors) }}">
                {!! Form::email('email', old('email'), [
                'placeholder' => 'Email',
                'class' => 'form-control',
            ]) !!}
                <span class="error help-block">{{ $errors->first('email') }}</span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Confirm</button>
                </div>
            </div>
            {{ Form::close() }}
            <a href="{{ route('admin.login') }}" class="text-center">Back Login</a>
        </div>
    </div>
@endsection
