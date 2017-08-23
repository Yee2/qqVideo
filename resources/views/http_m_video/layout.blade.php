<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="@yield('seo_keywords'),{{config('site.keywords')}}">
    <meta name="description" content="@yield('seo_description')">
    <title>@yield('title')_{{config('site.title')}}</title>
    <link rel="stylesheet" href="{{asset('m_video')}}/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="{{asset('m_video')}}/css/bootstrap-theme.min.css">--}}
    <link rel="stylesheet" href="{{asset('m_video')}}/css/index.css">
    <link rel="stylesheet" href="{{asset('m_video')}}/css/swiper-3.4.2.min.css">
<body>
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
        <script>var jd_uid="750959";var jd_tid="68";var jd_w="600";var jd_h="200";</script>
        <script charset="utf-8" src="http://xsthg.com/js/mob/cpc_i.js"></script>
    </div>
    <div class="row main" id="pjax-container">
        @yield('body')
    </div>
    <footer>
        <div class="ads">
            <script src='http://m.lflili.com/1491'></script>
            <script src='http://ad.cjxs.net/vs.php?id=97'></script>
        </div>
        <script src="https://s13.cnzz.com/z_stat.php?id=1263639858&web_id=1263639858" language="JavaScript"></script>
        <!--分享-->
        <a class="bshareDiv" href="http://www.bshare.cn/share">分享按钮</a>
        <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=&amp;style=3&amp;fs=4&amp;textcolor=#fff&amp;bgcolor=#19D&amp;text=分享到"></script>
    </footer>
</div>
<script src="{{asset('m_video')}}/js/jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/swiper-3.4.2.jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/bootstrap.min.js"></script>
<script src="{{asset('m_video')}}/js/jquery.pjax.js"></script>
<script src="{{asset('m_video')}}/js/index.js"></script>
</head>
</body>
</html>