@extends('admin.layout.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=#">{{ __('common.logo') }}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Verify Your Email Address</p>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
            <div class="row">
                <div class="col-xs-4">
                </div>
                <div class="col-xs-4">
                    {{ Form::open(['route' => 'admin.logout']) }}
                        <button type="submit" class="btn btn-primary btn-flat">Back login</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
