<div class="am-u-sm-12">
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <span>电影</span>
            <a href="{{route('video.category', 1)}}" class="am-fr">更多>></a>
        </div>
        <div class="am-panel-bd">
            @foreach($infoPc[1] as $item)
                @if($loop->index %4 == 0)
                    <div class="am-g">
                        <div class="am-u-sm-3 am-text-center">
                            <a href="{{route('video.info', $item->id)}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                     _src="{{route('video.getThumb', $item->id)}}" />
                            </a>
                            <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                        </div>
                        @elseif($loop->index %4 == 3)
                            <div class="am-u-sm-3 am-text-center">
                                <a href="{{route('video.info', $item->id)}}">
                                    <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                         _src="{{route('video.getThumb', $item->id)}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                            </div>
                    </div>
                @else
                    <div class="am-u-sm-3 am-text-center">
                        <a href="{{route('video.info', $item->id)}}">
                            <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                 _src="{{route('video.getThumb', $item->id)}}" />
                        </a>
                        <a href="{{route('video.info', $item->id)}}" >{{$item->title}}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="am-g">
        <div class="am-u-sm-12">
            <script src="http://wm.lrswl.com/page/s.php?s=250702&w=950&h=90"></script>
        </div>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <span>电视剧</span>
            <a href="{{route('video.category', ['id' => 2])}}" class="am-fr">更多>></a>
        </div>
        <div class="am-panel-bd">
            @foreach($infoPc[2] as $item)
                @if($loop->index %4 == 0)
                    <div class="am-g">
                        <div class="am-u-sm-3 am-text-center">
                            <a href="{{route('video.info', $item->id)}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                     _src="{{route('video.getThumb', $item->id)}}" />
                            </a>
                            <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                        </div>
                @elseif($loop->index %4 == 3)
                        <div class="am-u-sm-3 am-text-center">
                                <a href="{{route('video.info', $item->id)}}">
                                    <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                         _src="{{route('video.getThumb', $item->id)}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                            </div>
                    </div>
                @else
                    <div class="am-u-sm-3 am-text-center">
                        <a href="{{route('video.info', $item->id)}}">
                            <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                 _src="{{route('video.getThumb', $item->id)}}" />
                        </a>
                        <a href="{{route('video.info', $item->id)}}" >{{$item->title}}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <span>动漫</span>
            <a href="{{route('video.category', ['id' => 3])}}" class="am-fr">更多>></a>
        </div>
        <div class="am-panel-bd">
            @foreach($infoPc[3] as $item)
                @if($loop->index %4 == 0)
                    <div class="am-g">
                        <div class="am-u-sm-3 am-text-center">
                            <a href="{{route('video.info', $item->id)}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                     _src="{{route('video.getThumb', $item->id)}}" />
                            </a>
                            <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                        </div>
                @elseif($loop->index %4 == 3)
                        <div class="am-u-sm-3 am-text-center">
                                <a href="{{route('video.info', $item->id)}}">
                                    <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                         _src="{{route('video.getThumb', $item->id)}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                            </div>
                    </div>
                @else
                    <div class="am-u-sm-3 am-text-center">
                        <a href="{{route('video.info', $item->id)}}">
                            <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                 _src="{{route('video.getThumb', $item->id)}}" />
                        </a>
                        <a href="{{route('video.info', $item->id)}}" >{{$item->title}}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>