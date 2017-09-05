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
@yield('body')
</div>
@yield('footer_script')
</body>
</html>