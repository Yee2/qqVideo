<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台</title>
    <link rel="stylesheet" href="{{asset('m_video')}}/css/amazeui.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/css/style.css">
    <script src="{{asset('video')}}/js/jquery.min.js"></script>
    <script src="{{asset('video')}}/js/jquery.pjax.js"></script>
    <script src="{{asset('m_video')}}/js/amazeui.min.js"></script>
    <script src="{{asset('admin')}}/js/index.js"></script>
    @yield('header_script')
</head>
<body>
<div class="am-container-full">
    <header class="am-topbar am-topbar-inverse">
        <h1 class="am-topbar-brand">
            <a href="#">后台管理系统</a>
        </h1>
    </header>
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-2">
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
        <div class="am-u-sm-12 am-u-md-10" id="main">
            @yield('body')
        </div>
    </div>
</div>
@yield('footer_script')
</body>
</html>