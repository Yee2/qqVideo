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
    <link rel="stylesheet" href="{{asset('video')}}/css/index.css">
<body>
<div class="am-container">
    <div class="am-g">
        <div class="am-u-sm-2">
            <a href="{{route('video.index')}}">
                <div class="logo" title="logo_{{config('site.title')}}"></div>
            </a>
        </div>
        <div class="am-u-sm-6">
            <ul class="am-nav am-nav-pills">
                @foreach($data['category'] as $item)
                    <li @if(isset($cateName) && ($id == $item->id)) class="am-active" @endif>
                        <a href="{{route('video.category', $item->id)}}" title="{{$item->name}}_{{config('site.title')}}">{{$item->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="am-u-sm-4">
            <form action="{{route('video.search')}}" method="get" id="searchForm" class="am-form-inline am-fr">
                <div class="am-form-group">
                    <input name="title" type="text" placeholder="{{$title or $data['title']}}" id="search-input"
                           class="am-form-field am-radius" value="{{$title or $data['title']}}">
                    <button class="am-btn am-btn-warning" type="submit">搜索</button>
                </div>
            </form>
        </div>
    </div>
    <div class="am-g">
        <div class="am-u-sm-12">
            <script src="http://wm.lrswl.com/page/s.php?s=250703&w=728&h=90"></script>
        </div>
    </div>
    <div class="am-g main" id="pjax-container">
        @yield('body')
    </div>
    <div class="am-panel-footer">
        @include('video.copyright')
    </div>
</div>
<script src="{{asset('video')}}/js/jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/amazeui.min.js"></script>
<script src="{{asset('video')}}/js/jquery.pjax.js"></script>
<script src="{{asset('video')}}/js/index.js"></script>
@yield("footer_script")
</body>
</html>