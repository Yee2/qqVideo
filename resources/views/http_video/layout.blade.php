<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="@yield('seo_keywords'),{{config('site.keywords')}}">
    <meta name="description" content="@yield('seo_description')">
    <title>@yield('title')_{{config('site.title')}}</title>
    <meta baidu-gxt-verify-token="d646e803f30a0a7eba69199ded167a5c">
    <meta name="love" content="我们认识的第{{$data['weMetEdTime']}}天，相爱的第{{$data['weLoveEdTime']}}天">

    <link rel="stylesheet" href="{{asset('m_video')}}/css/amazeui.min.css">
    <link href="https://cdn.bootcss.com/bxslider/4.2.12/jquery.bxslider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('video')}}/css/index.css">
    <link rel="stylesheet" href="{{asset('video')}}/css/new.css">
<body>
<header class="top">
    <div class="am-container">
        <ul class="nav">
            <li>
                <a href="">爱剧影院</a>
            </li>
            @foreach($data['category'] as $item)
                <li @if(isset($cateName) && ($id == $item->id)) class="am-active" @endif>
                    <a href="{{route('video.category', $item->id)}}" title="{{$item->name}}_{{config('site.title')}}">{{$item->name}}</a>
                </li>
            @endforeach
            <li class="search">
                <div class="search-box">
                    <form action="{{route('video.search')}}" method="get" id="searchForm">
                        <input name="title" type="text" placeholder="{{$title or $data['title']}}" id="search-input"
                               class="am-form-field am-radius" value="{{$title or $data['title']}}">
                        <button class="am-btn am-btn-warning" type="submit">搜索</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
<div style="height: 50px;width: 100%;"></div>
<div class="am-container" id="ijuyingyuan">
    <div class="am-g main" id="pjax-container">
        @yield('body')
    </div>
    <footer>
        @include('video.copyright')
    </footer>
</div>
<script src="{{asset('video')}}/js/jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/amazeui.min.js"></script>
<script src="{{asset('video')}}/js/jquery.pjax.js"></script>

<script src="https://cdn.bootcss.com/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider();
    });
</script>

<script src="{{asset('video')}}/js/index.js"></script>
@yield("footer_script")
</body>
</html>