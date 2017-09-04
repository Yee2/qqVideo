<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="@yield('seo_keywords'),{{config('site.keywords')}}">
    <meta name="description" content="@yield('seo_description')[{{config('site.title')}}]">
    <title>@yield('title')_{{config('site.title')}}</title>
    <meta baidu-gxt-verify-token="d646e803f30a0a7eba69199ded167a5c">
    <meta name="love" content="我们认识的第{{$data['weMetEdTime']}}天，相爱的第{{$data['weLoveEdTime']}}天">
    <link rel="stylesheet" href="{{asset('m_video')}}/css/amazeui.min.css">
    <link rel="stylesheet" href="{{asset('m_video')}}/css/index.css">
<body>
<div class="am-container-full">
    <div class="am-g">
        <div class="am-u-sm-4">
            <a href="{{route('video.index')}}">
                <div class="logo" title="logo_{{config('site.title')}}"></div>
            </a>
        </div>
        <div class="am-u-sm-8">
            <a name="top"></a>
            <form action="{{route('video.search')}}" method="get" class="am-form" id="searchForm">
                <div class="am-input-group">
                    <input type="text" class="am-form-field" id="search-input" name="title"
                           placeholder="{{$title or $data['title']}}" value="{{$title or $data['title']}}">
                    <span class="am-input-group-btn">
                        <button class="am-btn am-btn-primary" id="search-btn" type="submit">
                            <i class="am-icon-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="am-g">
        <div class="am-u-sm-12">
            <script src='http://www.yezilm.com/vs.php?id=7622'></script>
        </div>
    </div>
    <div class="am-g main" id="pjax-container">
        @yield('body')
    </div>
    <div class="am-btn-group am-btn-group-justify fixed">
        <a class="am-btn am-btn-secondary" href="{{route('video.index')}}">
            <span>首页</span>
        </a>
        @foreach($data['category'] as $item)
            <a href="{{route('video.category', $item->id)}}" data-name="buttomBtn"
               class="am-btn @if(isset($cateName) && ($id == $item->id)) am-btn-primary @else am-btn-secondary @endif"
               role="button"
               title="{{$item->name}}_{{config('site.title')}}">{{$item->name}}</a>
        @endforeach
            <a class="am-btn am-btn-secondary" href="mailto:wuzunlin@foxmail.com">
                <span>建议</span>
            </a>
            <a class="am-btn am-btn-secondary" href="#top">
                <span>顶部</span>
                <i class="am-icon-arrow-up"></i>
            </a>
    </div>
    <div class="am-g">
        <div class="am-u-sm-12">
            <div class="ads">
                <script src='http://www.yezilm.com/vs.php?id=7622'></script>
            </div>
            <script src="https://s13.cnzz.com/z_stat.php?id=1263639858&web_id=1263639858" language="JavaScript"></script>
            <!--分享-->
            <a class="bshareDiv" href="http://www.bshare.cn/share">分享按钮</a>
            <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=&amp;style=3&amp;fs=4&amp;textcolor=#fff&amp;bgcolor=#19D&amp;text=分享到"></script>
        </div>
    </div>
</div>
<script src="{{asset('video')}}/js/jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/amazeui.min.js"></script>
<script src="{{asset('video')}}/js/jquery.pjax.js"></script>
<script src="{{asset('video')}}/js/index.js"></script>
@yield("footer_script")
</body>
</html>