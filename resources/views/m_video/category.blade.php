<div class="col-xs-12">
    <div class="panel panel-default contentLeft">
        <div class="panel-body dataList">
            <!--电影start-->
            @if($data['isMobile'])
                @foreach($list as $item)
                    @if($loop->index%2 == 0)
                    <div class="row body">
                    @endif
                        <div class="col-xs-6 shipin">
                            <a href="{{route('video.info', $item->id)}}" class="thumbnail"
                               title="{{$item->title}}_{{config('site.title')}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" _src="{{route('video.getThumb', $item->id)}}"
                                     alt="{{$item->title}}_{{config('site.title')}}">
                                <div class="title">
                                    <p class="text-center">{{$item->title}}</p>
                                </div>
                            </a>
                        </div>
                    @if($loop->index%2 == 1)
                    </div>
                    @endif
                @endforeach
            @else
                @foreach($list as $item)
                    @if($loop->index%4 == 0)
                    <div class="row body">
                    @endif
                        <div class="col-xs-3 shipin">
                            <a href="{{route('video.info', $item->id)}}" class="thumbnail"
                               title="{{$item->title}}_{{config('site.title')}}">
                                <img src="{{asset('m_video')}}/img/videoLoading.gif" _src="{{route('video.getThumb', $item->id)}}"
                                     alt="{{$item->title}}_{{config('site.title')}}">
                                <div class="title">
                                    <p class="text-center">{{$item->title}}</p>
                                </div>
                            </a>
                        </div>
                    @if($loop->index%4 == 3)
                    </div>
                    @endif
                @endforeach
            @endif
            <!--电影end-->
        </div>
        <div class="panel-footer">
            <nav aria-label="Page navigation" style="text-align: center">
                {{$list->links('paginate.video_m_category', ['id' => $id, 'cateName' => $cateName])}}
            </nav>
        </div>
    </div>
</div>