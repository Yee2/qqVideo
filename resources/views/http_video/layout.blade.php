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
    <link rel="stylesheet" href="{{asset('video')}}/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="{{asset('m_video')}}/css/bootstrap-theme.min.css">--}}
    <link rel="stylesheet" href="{{asset('video')}}/css/index.css">
<body>
<!-- 和媳妇一起度过的第{{$data['weLoveEdTime']}}天 -->
<div class="@if(!$data['isMobile']) container @endif">
    <header>
        <div class="row">
            <div class="col-xs-4">
                <a href="{{route('video.index')}}">
                    <div class="logo" title="logo_{{config('site.title')}}"></div>
                </a>
            </div>
            <div class="col-xs-8">
                <form action="{{route('video.search')}}" method="get" class="searchForm input-group">
                    <input name="title" type="text" class="form-control"
                           placeholder="{{$title or $data['title']}}" value="{{$title or $data['title']}}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">搜索</button>
                    </span>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="nav nav-tabs nav-list">
                    @foreach($data['category'] as $item)
                        <li class="presentation">
                            <a href="{{route('video.category', $item->id)}}" title="{{$item->name}}_{{config('site.title')}}">{{$item->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </header>
    <div class="ads">

    </div>
    <div class="row main" id="pjax-container">
        @yield('body')
    </div>
</div>
<script src="{{asset('video')}}/js/jquery.min.js"></script>
<script src="{{asset('video')}}/js/bootstrap.min.js"></script>
<script src="{{asset('video')}}/js/jquery.pjax.js"></script>
<script src="{{asset('video')}}/js/index.js"></script>
</body>
</html>