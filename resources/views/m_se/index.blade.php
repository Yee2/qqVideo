<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>首页</title>
    <link rel="stylesheet" href="{{asset('m_se')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('m_se')}}/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{asset('m_se')}}/css/swiper-3.4.2.min.css">
    <link rel="stylesheet" href="{{asset('m_se')}}/css/index.css">
</head>
<body>
<div class="">
    <header>
        <div class="row">
            <div class="col-xs-4">
                <a href="./">
                    <div class="logo"></div>
                </a>
            </div>
            <div class="col-xs-8">
                <div class="searchForm input-group">
                    <input type="text" class="form-control" placeholder="楚乔传">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">搜索</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="nav nav-tabs nav-list">
                    @foreach($category as $item)
                        <li class="presentation">
                            <a href="{{route('se.category', $item->id)}}">{{$item->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </header>
    <div class="row main" id="pjax-container">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body dataList">
                    <!--热门推荐start-->
                    <div class="row header">
                        <div class="col-xs-8">
                            <h4 class="title">
                                <span class="hotThumb"></span>
                                <a href="">热门推荐</a>
                            </h4>
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach($info as $item)
                            <div class="row list-group-item shipin">
                                <div class="col-xs-4">
                                    <a href="{{route('se.info', $item->id)}}" class="thumbnail">
                                        <img src="{{route('se.getThumb', $item->id)}}" />
                                    </a>
                                </div>
                                <div class="col-xs-8">
                                    <a href="{{route('se.info', $item->id)}}">
                                        <div class="title">{{$item->title}}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--热门推荐end-->
                </div>
                <div class="panel-footer">
                    <p class="text-center small">有些东西失去了就永远找不回</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('m_se')}}/js/jquery.min.js"></script>
<script src="{{asset('m_se')}}/js/swiper-3.4.2.jquery.min.js"></script>
<script src="{{asset('m_se')}}/js/swiper.animate1.0.2.min.js"></script>
<script src="{{asset('m_se')}}/js/bootstrap.min.js"></script>
<script src="{{asset('m_se')}}/js/jquery.goup.min.js"></script>
<script src="{{asset('m_se')}}/js/jquery.pjax.js"></script>
<script src="{{asset('m_se')}}/js/index.js"></script>
</body>
</html>