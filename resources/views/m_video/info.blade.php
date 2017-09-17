<div class="am-panel am-panel-default">
    <div class="am-panel-hd">
        <ol class="am-breadcrumb" style="margin: 0;padding: 0;">
            <li>
                <a href="{{route('video.index')}}" title="{{config('site.title')}}" class="am-icon-home">首页</a>
            </li>
            <li><a href="{{route('video.category', $info->type_id)}}"
                   title="{{$info['typeName']}}_{{config('site.title')}}">{{$info['typeName']}}</a></li>
            <li class="active" title="{{$info->title}}_{{config('site.title')}}">{{$info->title}}</li>
        </ol>
    </div>
    <div class="am-panel-bd">
        <iframe src="{{config('site.playUrl')}}{{$sourceUrl}}" style="width:100%;height: 550px;" id="iframeVideo"></iframe>
        <div style="width:100%">
            <div id="videoGroup" class="am-btn-group" style="width: 100%;overflow-x: scroll;white-space: nowrap;">
                @foreach($videos as $item)
                    <a href="{{route('video.info', [
                        'id' => $info->id,
                        'infoId' => $item->id
                        ])}}" class="am-btn @if($item->id == $infoId) am-btn-default @else am-btn-secondary @endif"
                       style="float:none" {{--pjax="false"--}} title="第{{(($loop->iteration <10)?('0'.$loop->iteration):$loop->iteration)}}集_{{$info->title}}_{{config('site.title')}}"
                       data-href="{{config('site.playUrl')}}{{$item->source_url}}" data-index="{{$loop->index}}">
                        第{{(($loop->iteration <10)?('0'.$loop->iteration):$loop->iteration)}}集
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="am-panel-ft">
        {{--<div class="ads">
            <script src='http://www.yezilm.com/vs.php?id=7622'></script>
        </div>--}}
        <div class="am-g">
            <div class="am-u-sm-12">
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">
                        您可能喜欢
                    </div>
                    <div class="am-panel-bd">
                        @foreach($rand as $item)
                            @if($loop->index %4 == 0)
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-text-center">
                                        <a href="{{route('video.info', $item->id)}}">
                                            <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                                 _src="{{$item->nowThumb()}}{{--{{route('video.getThumb', $item->id)}}--}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                                    </div>
                                    @elseif($loop->index %4 == 3)
                                        <div class="am-u-sm-3 am-text-center">
                                            <a href="{{route('video.info', $item->id)}}">
                                                <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                                     _src="{{$item->nowThumb()}}{{--{{route('video.getThumb', $item->id)}}--}}" />
                                            </a>
                                            <a href="{{route('video.info', $item->id)}}">{{$item->title}}</a>
                                        </div>
                                </div>
                            @else
                                <div class="am-u-sm-3 am-text-center">
                                    <a href="{{route('video.info', $item->id)}}">
                                        <img src="{{asset('m_video')}}/img/videoLoading.gif" class="am-img-thumbnail"
                                             _src="{{$item->nowThumb()}}{{--{{route('video.getThumb', $item->id)}}--}}" />
                                    </a>
                                    <a href="{{route('video.info', $item->id)}}" >{{$item->title}}</a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>