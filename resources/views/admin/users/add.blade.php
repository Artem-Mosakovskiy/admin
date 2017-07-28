@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавить пользователя</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/users/save" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="{{ $errors->has('f_name') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Фамилия</label>
                                {{ Form::text('f_name', null, ['class' => 'form-control', 'placeholder' => 'Фамилия']) }}
                                {!! $errors->first('f_name', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('s_name') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Имя</label>
                                {{ Form::text('s_name', null, ['class' => 'form-control', 'placeholder' => 'Имя']) }}
                                {!! $errors->first('s_name', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('t_name') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Отчество</label>
                                {{ Form::text('t_name', null, ['class' => 'form-control', 'placeholder' => 'Отчество']) }}
                                {!! $errors->first('t_name', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('login') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Логин</label>
                                {{ Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Логин']) }}
                                {!! $errors->first('login', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('password') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Пароль</label>
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Пароль']) }}
                                {!! $errors->first('password', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('password_confirmation') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Подтверждение пароля</label>
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Подтверждение пароля']) }}
                                {!! $errors->first('password_confirmation', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('role_id') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Роль на сайте</label>
                                {{ Form::select('role_id', $user_roles, null, ['class' => 'form-control']) }}
                                {!! $errors->first('role_id', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('type_id') ? 'form-group has-error' : 'form-group' }}">
                                <label for="exampleInputEmail1">Тип пользователя</label>
                                {{ Form::select('type_id', $user_types, null, ['class' => 'form-control']) }}
                                {!! $errors->first('type_id', '<span class="help-block">:message</label>') !!}
                            </div>

                            <div class="{{ $errors->has('types') ? 'form-group has-error' : 'form-group' }}">
                                <label>Компании (можно несколько)</label>
                                {{ Form::select('types[]', [], null, ['class' => 'form-control', 'multiple', 'id'=>'types']) }}

                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection