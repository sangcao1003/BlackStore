@extends('admin.layout.admin')

@section('script')
    <script src="{{ asset('assets/public/js/admin/pages/user.js') }}"></script>
@endsection

@section('content')
    <section class="content col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $boxTitle }}</h3>
            </div>
            <div class="box-body">
                {!! Form::open([
                    'action' => 'Admin\UserController@changePassword',
                    'method' => 'PUT',
                    'autocomplete' => 'off',
                ]) !!}
                    <div class="form-group row {{ has_error('current_password', $errors) }}">
                        {!! Form::label('current_password', __('models/user.fields.current_password'), ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            {!! Form::password('current_password', [
                                'placeholder' => __('models/user.fields.current_password'),
                                'class' => 'form-control',
                            ]) !!}
                            <span class="help-block">{{ $errors->first('current_password') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ has_error('new_password', $errors) }}">
                        {!! Form::label('new_password', __('models/user.fields.new_password'), ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            {!! Form::password('new_password', [
                                'placeholder' => __('models/user.fields.new_password'),
                                'class' => 'form-control',
                            ]) !!}
                            <span class="help-block">{{ $errors->first('new_password') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ has_error('new_password_confirmation', $errors) }}">
                        {!! Form::label('new_password_confirmation', __('models/user.fields.new_password_confirmation'), ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            {!! Form::password('new_password_confirmation', [
                                'placeholder' => __('models/user.fields.new_password_confirmation'),
                                'class' => 'form-control',
                            ]) !!}
                            <span class="help-block">{{ $errors->first('new_password_confirmation') }}</span>
                        </div>
                    </div>

                    <div>
                        {!! Form::submit(__('common.actions.save'), ['class' => 'btn btn-primary ']) !!}
                        <a href="{{ route('users.profile') }}" class="btn btn-default">{{ __('common.actions.back') }}</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
