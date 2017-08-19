<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('m_video')}}/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="{{asset('m_video')}}/css/bootstrap-theme.min.css">--}}
    <link rel="stylesheet" href="{{asset('m_video')}}/css/index.css">
    <link rel="stylesheet" href="{{asset('m_video')}}/css/swiper-3.4.2.min.css">
<body>
<div class="">
    <header>
        <div class="row">
            <div class="col-xs-4">
                <a href="{{route('video.index')}}">
                    <div class="logo"></div>
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
                            <a href="{{route('video.category', $item->id)}}">{{$item->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </header>
    <div class="ads">
        <script language="javascript" src="http://sy.kcxsyz.com/1191/2/1"></script>
    </div>
    <div class="row main" id="pjax-container">
        @yield('body')
    </div>
    <footer>
        <div class="ads">
            <script language="javascript" src="http://sy.kcxsyz.com/1191/1/1"></script>
            <script>var jd_uid=750959;var jd_tid=60;var os=0;var jd_w=640;var jd_h=200;</script>
            <script charset="utf-8" src="http://xsthg.com/js/mob/top.js"></script>
        </div>
    </footer>
</div>
<script src="{{asset('m_video')}}/js/jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/swiper-3.4.2.jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/bootstrap.min.js"></script>
<script src="{{asset('m_video')}}/js/jquery.pjax.js"></script>
<script src="{{asset('m_video')}}/js/index.js"></script>
<script src="https://s13.cnzz.com/z_stat.php?id=1263639858&web_id=1263639858" language="JavaScript"></script>
</head>
</body>
</html>