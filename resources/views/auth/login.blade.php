@extends('layouts.app')

@section('content')
    <div class="am-u-sm-6 am-u-sm-offset-3">
        <div class="am-vertical-align" style="height: 500px">
            <div class="am-panel am-panel-primary am-vertical-align-middle am-center">
                <div class="am-panel-hd">登录</div>
                <div class="am-panel-bd">
                    <form class="am-form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="am-form-group">
                            <label for="email" class="am-u-sm-3 am-form-label">邮箱</label>

                            <div class="am-u-sm-9">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="am-form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="am-u-sm-3 am-form-label">密码</label>

                            <div class="am-u-sm-9">
                                <input id="password" type="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-7 am-u-sm-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-offset-3">
                                <button type="submit" class="am-btn am-btn-primary">
                                    登录
                                </button>

                                <a class="am-btn am-btn-link" href="{{ route('password.request') }}">
                                    忘记密码?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
