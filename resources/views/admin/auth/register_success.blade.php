@extends('admin.layout.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=#">{{ __('common.logo') }}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Register Success</p>
            <div class="row">
                <div class="col-xs-12">
                    <p>{{ __('Please check your email for a verification link') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                </div>
                <div class="col-xs-4">
                    <a href="{{ route('admin.login') }}" class="btn btn-primary btn-block btn-flat">Back login</a>
                </div>
            </div>
        </div>
    </div>
@endsection
