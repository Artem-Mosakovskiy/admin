@extends('layouts.auth')

@section('content')
    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Узлы</b> учета</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Регистрация</p>

            <form action="{{ route('register') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group has-feedback">
                    <input id="name" type="text" class="form-control" name="f_name" value="{{ old('f_name') }}" placeholder="Ф" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('f_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('f_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input id="name" type="text" class="form-control" name="s_name" value="{{ old('s_name') }}" placeholder="И" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('s_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('s_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input id="name" type="text" class="form-control" name="t_name" value="{{ old('t_name') }}" placeholder="О" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('t_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('t_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input id="name" type="text" class="form-control" name="login" value="{{ old('login') }}" placeholder="Логин" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('login'))
                        <span class="help-block">
                            <strong>{{ $errors->first('login') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Пароль" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

               {{-- <div class="form-group has-feedback">
                    {{ Form::select('role', $user_roles, null, ['class' => 'form-control']) }}
                </div>--}}

                {{--<div class="form-group has-feedback">
                    {{ Form::select('type', $user_types, null, ['class' => 'form-control']) }}
                </div>
--}}
                <div class="row">
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Регистрация</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    </body>
@endsection

@section('content1')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
