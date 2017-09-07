@extends('layouts.app')
@section('header_script')
    <link rel="stylesheet" href="{{asset('admin')}}/css/login.css">
@endsection
@section('content')
    <div class="am-g">
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered am-content">
            <h1>SIGN IN</h1>
            <form action="" class="am-form am-form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="am-form-group">
                    <label for="userName" class="am-u-sm-2 am-form-label">
                        <i class="am-icon-user-md am-icon-sm"></i>
                    </label>
                    <div class="am-u-sm-12">
                        <input type="email" placeholder="输入邮箱" name="email" />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="password" class="am-u-sm-2 am-form-label">
                        <i class="am-icon-lock am-icon-sm"></i>
                    </label>
                    <div class="am-u-sm-12">
                        <input type="password" placeholder="输入密码" name="password" />
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button class="am-btn am-btn-secondary am-btn-block">登录</button>
            </form>
        </div>
    </div>
@endsection
@section('footer_script')
    <script src="{{asset('admin')}}/js/login.js"></script>
@endsection
