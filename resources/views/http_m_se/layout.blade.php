<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('m_se')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('m_se')}}/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{asset('m_se')}}/css/index.css">
    <script src="{{asset('m_se')}}/js/jquery.min.js"></script>
    <script src="{{asset('m_se')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('m_se')}}/js/jquery.pjax.js"></script>
    <script src="{{asset('m_se')}}/js/index.js"></script>
</head>
<body>
<div class="">
    <header>
        <div class="row">
            <div class="col-xs-4">
                <a href="{{route('se.index')}}">
                    <div class="logo"></div>
                </a>
            </div>
            <div class="col-xs-8">
                <form action="{{route('se.search')}}" method="post" class="searchForm input-group">
                    <input name="title" type="text" class="form-control"
                           placeholder="{{$title or $data['title']}}" value="{{$title or $data['title']}}">
                    {{csrf_field()}}
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
                            <a href="{{route('se.category', $item->id)}}">{{$item->name}}</a>
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
</body>
</html>