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
    <div class="row main" id="pjax-container">
        @yield('body')
    </div>
</div>
<script src="{{asset('m_video')}}/js/jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/swiper-3.4.2.jquery.min.js"></script>
<script src="{{asset('m_video')}}/js/bootstrap.min.js"></script>
<script src="{{asset('m_video')}}/js/jquery.pjax.js"></script>
<script src="{{asset('m_video')}}/js/index.js"></script>
</head>
</body>
</html>