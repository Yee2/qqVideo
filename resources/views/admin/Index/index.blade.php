@extends('admin.Layout.app')
@section('body')
    <header class="am-topbar am-topbar-inverse">
        <h1 class="am-topbar-brand">
            <a href="#">后台管理系统</a>
        </h1>
    </header>
    <div class="am-g">
        <div class="am-u-sm-5 am-u-md-2">
            <ul class="am-list am-list-static am-list-border">
                <li>
                    <a href="" pjax="true">
                        <i class="am-icon-home am-icon-fw"></i>修改密码
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.Album.index')}}" pjax="true">
                        <i class="am-icon-book am-icon-fw"></i>资源管理
                    </a>
                </li>
                <li>
                    <a href="" pjax="false">
                        <i class="am-icon-pencil am-icon-fw"></i>退出
                    </a>
                </li>
            </ul>
        </div>
        <div class="am-u-sm-10" id="main">

        </div>
    </div>
@endsection