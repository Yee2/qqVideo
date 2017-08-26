<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-body dataList">
            <!--热门推荐start-->
            <div class="row header">
                <div class="col-xs-8">
                    <h4 class="title">
                        <span class="hotThumb"></span>
                        <a href="{{route('video.category', ['id' => 1])}}">电影</a>
                    </h4>
                </div>
            </div>

            @if($data['isMobile'])
                <div class="list-group">
                    @foreach($info[1] as $item)
                        @if($loop->index %2 == 0)
                            <div class="row list-group-item shipin">
                                <div class="col-xs-6">
                                    <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                        <img src="{{route('video.getThumb', $item->id)}}" />
                                    </a>
                                    <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                        <div class="title text-center">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %2 == 1)
                                    <div class="col-xs-6">
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                            <img src="{{route('video.getThumb', $item->id)}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                            <div class="title text-center">{{$item->title}}</div>
                                        </a>
                                    </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="list-group">
                    @foreach($infoPc[1] as $item)
                        @if($loop->index %6 == 0)
                            <div class="row list-group-item shipin">
                                <div class="col-sm-2">
                                    <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                                        <img src="{{route('video.getThumb', $item->id)}}" />
                                    </a>
                                    <a href="{{route('video.info', $item->id)}}">
                                        <div class="title text-center">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %6 == 5)
                                    <div class="col-sm-2">
                                        <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                                            <img src="{{route('video.getThumb', $item->id)}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}" >
                                            <div class="title text-center">{{$item->title}}</div>
                                        </a>
                                    </div>
                            </div>
                        @else
                            <div class="col-sm-2">
                                <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                                    <img src="{{route('video.getThumb', $item->id)}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}" >
                                    <div class="title text-center">{{$item->title}}</div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            <div class="ads">

            </div>

            <div class="row header">
                <div class="col-xs-8">
                    <h4 class="title">
                        <span class="hotThumb"></span>
                        <a href="{{route('video.category', ['id' => 2])}}">电视剧</a>
                    </h4>
                </div>
            </div>
            @if($data['isMobile'])
                <div class="list-group">
                    @foreach($info[2] as $item)
                        @if($loop->index %2 == 0)
                            <div class="row list-group-item shipin">
                                <div class="col-xs-6">
                                    <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                        <img src="{{route('video.getThumb', $item->id)}}" />
                                    </a>
                                    <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                        <div class="title text-center">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %2 == 1)
                                    <div class="col-xs-6">
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                            <img src="{{route('video.getThumb', $item->id)}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                            <div class="title text-center">{{$item->title}}</div>
                                        </a>
                                    </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="list-group">
                    @foreach($infoPc[2] as $item)
                        @if($loop->index %6 == 0)
                            <div class="row list-group-item shipin">
                                <div class="col-sm-2">
                                    <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                                        <img src="{{route('video.getThumb', $item->id)}}" />
                                    </a>
                                    <a href="{{route('video.info', $item->id)}}">
                                        <div class="title text-center">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %6 == 5)
                                    <div class="col-sm-2">
                                        <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                                            <img src="{{route('video.getThumb', $item->id)}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}" >
                                            <div class="title text-center">{{$item->title}}</div>
                                        </a>
                                    </div>
                            </div>
                        @else
                            <div class="col-sm-2">
                                <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                                    <img src="{{route('video.getThumb', $item->id)}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}" >
                                    <div class="title text-center">{{$item->title}}</div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="ads">

            </div>

            <div class="row header">
                <div class="col-xs-8">
                    <h4 class="title">
                        <span class="hotThumb"></span>
                        <a href="{{route('video.category', ['id' => 3])}}">动漫</a>
                    </h4>
                </div>
            </div>
            @if($data['isMobile'])
                <div class="list-group">
                    @foreach($info[3] as $item)
                        @if($loop->index %2 == 0)
                            <div class="row list-group-item shipin">
                                <div class="col-xs-6">
                                    <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                        <img src="{{route('video.getThumb', $item->id)}}" />
                                    </a>
                                    <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                        <div class="title text-center">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %2 == 1)
                                    <div class="col-xs-6">
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                            <img src="{{route('video.getThumb', $item->id)}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                            <div class="title text-center">{{$item->title}}</div>
                                        </a>
                                    </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="list-group">
                    @foreach($infoPc[3] as $item)
                        @if($loop->index %6 == 0)
                            <div class="row list-group-item shipin">
                                <div class="col-sm-2">
                                    <a href="{{route('video.info', $item->id)}}" class="thumbnail"
                                       title="{{$item->title}}_{{config('site.title')}}">
                                        <img src="{{route('video.getThumb', $item->id)}}"
                                             alt="{{$item->title}}_{{config('site.title')}}" />
                                    </a>
                                    <a href="{{route('video.info', $item->id)}}"
                                       title="{{$item->title}}_{{config('site.title')}}">
                                        <div class="title text-center">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %6 == 5)
                                    <div class="col-sm-2">
                                        <a href="{{route('video.info', $item->id)}}" class="thumbnail"
                                           title="{{$item->title}}_{{config('site.title')}}">
                                            <img src="{{route('video.getThumb', $item->id)}}"
                                                 alt="{{$item->title}}_{{config('site.title')}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}"
                                           title="{{$item->title}}_{{config('site.title')}}">
                                            <div class="title text-center">{{$item->title}}</div>
                                        </a>
                                    </div>
                            </div>
                        @else
                            <div class="col-sm-2">
                                <a href="{{route('video.info', $item->id)}}" class="thumbnail"
                                   title="{{$item->title}}_{{config('site.title')}}">
                                    <img src="{{route('video.getThumb', $item->id)}}"
                                         alt="{{$item->title}}_{{config('site.title')}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}"
                                   title="{{$item->title}}_{{config('site.title')}}">
                                    <div class="title text-center">{{$item->title}}</div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
             @endif
            <div class="ads">

            </div>

            <!--热门推荐end-->
        </div>
        <div class="panel-footer">
            <p class="text-center small">友情提示：请勿长时间观看影视，注意保护视力并预防近视，合理安排时间，享受健康生活，备案号：黔ICP备17000996号-1</p>
            <p class="text-center small">相关事项：如果本站收集的链接地址无意侵犯了您的权益，请来邮件告知，我们会及时进行处理。邮箱：3123118153#qq.com(请#改为@)</p>

            <p class="text-center small">版权声明：爱剧影院(www.ijuyingyuan.cn) 为非赢利性站点，电影资源系收集于互联网，是好看的电影天堂，更新最快的电影网站.</p>
        </div>
    </div>
</div>