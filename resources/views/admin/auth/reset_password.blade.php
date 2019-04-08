@extends('admin.layout.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=#">{{ __('common.logo') }}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Reset password</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {!! Form::open(['action' => 'Admin\Auth\ResetPasswordController@reset', 'class' => 'auth__form']) !!}
                {!! Form::input('hidden', 'token', $token) !!}
                {!! Form::input('hidden', 'email', $email) !!}
                <div class="form-group {{ has_error('password', $errors) }}">
                    <div class="form-group__input">
                        {!! Form::input('password', 'password', null, [
                            'placeholder' => 'New password',
                            'class' => 'form-control',
                        ]) !!}
                    </div>
                </div>
                <div class="form-group {{ has_error('password', $errors) }}">
                    <div class="form-group__input">
                        {!! Form::input('password', 'password_confirmation', null, [
                            'placeholder' => 'Confirm new password',
                            'class' => 'form-control',
                        ]) !!}
                    </div>
                    <span class="error help-block">{{ $errors->first('password') }}</span>
                </div>
            <div class="row">
                <div class="col-xs-4">
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                </div>
            </div>
                    <a href="{{ route('admin.login') }}">Back login</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
