<div class="am-u-sm-12">
    <div class="am-panel am-panel-default">
        <div class="am-panel-bd">
            @foreach($list as $item)
                @if($loop->index %4 == 0)
                    <div class="am-g">
                        <div class="am-u-sm-3 am-text-center">
                            <a href="{{route('video.info', $item->id)}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                     _src="{{--{{route('video.getThumb', $item->id)}}--}}{{$item->nowThumb()}}" />
                            </a>
                            <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                        </div>
                        @elseif($loop->index %4 == 3)
                            <div class="am-u-sm-3 am-text-center">
                                <a href="{{route('video.info', $item->id)}}">
                                    <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                         _src="{{--{{route('video.getThumb', $item->id)}}--}}{{$item->nowThumb()}}" />
                                </a>
                                <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                            </div>
                    </div>
                @else
                    <div class="am-u-sm-3 am-text-center">
                        <a href="{{route('video.info', $item->id)}}">
                            <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                 _src="{{--{{route('video.getThumb', $item->id)}}--}}{{$item->nowThumb()}}" />
                        </a>
                        <a href="{{route('video.info', $item->id)}}" >{{$item->title}}</a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="am-panel-ft">
            {{$list->links('video.video_category', ['id' => $id, 'cateName' => $cateName])}}
        </div>
    </div>
</div>