<div class="am-panel am-panel-default">
    <div class="am-panel-bd">
            <!--热门推荐start-->
            <h4 class="title">
                <span>电影</span>
                <a href="{{route('video.category', 1)}}" class="am-fr">更多>></a>
            </h4>
            @foreach($info[1] as $item)
                @if($loop->index %2 == 0)
                    <div class="am-g shipin-group">
                        <div class="am-u-sm-6 am-text-center">
                            <a href="{{route('video.info', $item->id)}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                     _src="{{route('video.getThumb', $item->id)}}" />
                            </a>
                            <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                        </div>
                        @elseif($loop->index %2 == 1)
                            <div class="am-u-sm-6 am-text-center">
                                <a href="{{route('video.info', $item->id)}}">
                                    <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                         _src="{{route('video.getThumb', $item->id)}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                            </div>
                    </div>
                @endif
            @endforeach
            <div class="am-g">
                <div class="am-u-sm-12">
                    <script src='http://www.yezilm.com/vs.php?id=7622'></script>
                </div>
            </div>
            <h4 class="title">
                <span href="">电视剧</span>
                <a href="{{route('video.category', 2)}}" class="am-fr">更多>></a>
            </h4>
            @foreach($info[2] as $item)
                @if($loop->index %2 == 0)
                    <div class="am-g shipin-group">
                        <div class="am-u-sm-6 am-text-center">
                            <a href="{{route('video.info', $item->id)}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                     _src="{{route('video.getThumb', $item->id)}}" />
                            </a>
                            <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                        </div>
                        @elseif($loop->index %2 == 1)
                            <div class="am-u-sm-6 am-text-center">
                                <a href="{{route('video.info', $item->id)}}">
                                    <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                         _src="{{route('video.getThumb', $item->id)}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                            </div>
                    </div>
                @endif
            @endforeach
            <div class="am-g">
                <div class="am-u-sm-12">
                    <script src='http://www.yezilm.com/vs.php?id=7622'></script>
                </div>
            </div>
            <h4 class="title">
                <span>动漫</span>
                <a href="{{route('video.category', 3)}}" class="am-fr">更多>></a>
            </h4>
            @foreach($info[3] as $item)
                @if($loop->index %2 == 0)
                    <div class="am-g shipin-group">
                        <div class="am-u-sm-6 am-text-center">
                            <a href="{{route('video.info', $item->id)}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                     _src="{{route('video.getThumb', $item->id)}}" />
                            </a>
                            <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                        </div>
                        @elseif($loop->index %2 == 1)
                            <div class="am-u-sm-6 am-text-center">
                                <a href="{{route('video.info', $item->id)}}">
                                    <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                         _src="{{route('video.getThumb', $item->id)}}"/>
                                </a>
                                <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                            </div>
                    </div>
                @endif
            @endforeach
        </div>
</div>