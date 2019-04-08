@extends('admin.layout.auth')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="#">{{ __('common.logo') }}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ __('common.title_register') }}</p>
            {{ Form::open(['method' => 'post']) }}
                <div class="form-group has-feedback {{ has_error('name', $errors) }}">
                    {!! Form::text('name', null, [
                    'placeholder' => 'Name',
                    'class' => 'form-control',
                ]) !!}
                    <span class="error help-block">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group has-feedback {{ has_error('email', $errors) }}">
                    {!! Form::email('email', old('email'), [
                    'placeholder' => 'Email',
                    'class' => 'form-control',
                ]) !!}
                    <span class="error help-block">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group {{ has_error('password', $errors) }}">
                    {!! Form::password('password', [
                        'placeholder' => __('models/user.fields.password'),
                        'class' => 'form-control',
                    ]) !!}
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>
                <div class="form-group {{ has_error('password_confirmation', $errors) }}">
                    {!! Form::password('password_confirmation', [
                        'placeholder' => __('models/user.fields.password_confirmation'),
                        'class' => 'form-control',
                    ]) !!}
                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                </div>
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                </div>
            {{ Form::close() }}
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
            </div>

            <a href="{{ route('admin.login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
@endsection
