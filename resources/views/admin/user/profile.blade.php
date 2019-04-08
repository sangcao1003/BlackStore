@extends('admin.layout.admin')

@section('script')
    <script src="{{ asset('assets/public/js/admin/pages/user.js') }}"></script>
@endsection

@section('content')
    <section class="content col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $boxTitle }}</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('users.password') }}" class="btn btn-primary btn-sm">{{ __('models/user.button.password') }}</a>
                </div>

            </div>
            <div class="box-body">
                {!! Form::open([
                    'action' => 'Admin\UserController@updateProfileUser',
                    'method' => 'PUT',
                    'autocomplete' => 'off',
                ]) !!}
                    {!! Form::hidden('id', $user->id) !!}
                    <div class="form-group row {{ has_error('email', $errors) }}">
                        {!! Form::label('email', __('models/user.fields.email'), ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            {!! Form::email('email', $user->email, [
                                'placeholder' => __('models/user.fields.email'),
                                'class' => 'form-control',
                                'disabled' => 'disabled',
                            ]) !!}
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ has_error('name', $errors) }}">
                        {!! Form::label('name', __('models/user.fields.name'), ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            {!! Form::text('name', $user->name, [
                                'placeholder' => __('models/user.fields.name'),
                                'class' => 'form-control',
                            ]) !!}
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ has_error('gender', $errors) }} ">
                        {!! Form::label('gender', __('models/user.fields.gender'), ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            {!! Form::select('gender',
                                ['' => null] + $genders,
                                $user->gender,
                                [
                                    'class' => 'select__value-list select2 select--full'
                                ])
                            !!}
                            <span class="help-block">{{ $errors->first('gender') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ has_error('birthday', $errors) }}">
                        {!! Form::label('birthday', __('models/user.fields.birthday'), ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            {!! Form::text('birthday', $user->birthday, [
                                'placeholder' => __('models/user.fields.birthday'),
                                'class' => 'form-control birthday',
                                'readonly' => 'readonly'
                            ]) !!}
                            <span class="help-block">{{ $errors->first('birthday') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ has_error('telephone', $errors) }}">
                        {!! Form::label('telephone', __('models/user.fields.telephone'), ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            {!! Form::text('telephone', $user->telephone, [
                                'placeholder' => __('models/user.fields.telephone'),
                                'class' => 'form-control',
                            ]) !!}
                            <span class="help-block">{{ $errors->first('telephone') }}</span>
                        </div>
                    </div>
                    <div>
                        {!! Form::submit(__('common.actions.save'), ['class' => 'btn btn-primary ']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
