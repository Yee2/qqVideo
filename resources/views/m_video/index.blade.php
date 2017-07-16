<div class="col-xs-12">
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
            @foreach($info[1] as $item)
                @if(($loop->index%4) == 0)
                    <div class="row body">
                @endif
                    <div class="col-xs-3 shipin">
                        <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                            <img src="{{route('video.getThumb', $item->id)}}" alt="">
                            <div class="title">
                                <p class="text-center">{{$item->title}}</p>
                            </div>
                        </a>
                    </div>
                @if($loop->index%4 == 3)
                    </div>
                @endif
            @endforeach

            <div class="row header">
                <div class="col-xs-8">
                    <h4 class="title">
                        <span class="hotThumb"></span>
                        <a href="{{route('video.category', ['id' => 2])}}">电视剧</a>
                    </h4>
                </div>
            </div>
            @foreach($info[2] as $item)
                @if(($loop->index%4) == 0)
                    <div class="row body">
                @endif
                    <div class="col-xs-3 shipin">
                        <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                            <img src="{{route('video.getThumb', $item->id)}}" alt="">
                            <div class="title">
                                <p class="text-center">{{$item->title}}</p>
                            </div>
                        </a>
                    </div>
                @if($loop->index%4 == 3)
                    </div>
                @endif
            @endforeach

            <div class="row header">
                <div class="col-xs-8">
                    <h4 class="title">
                        <span class="hotThumb"></span>
                        <a href="{{route('video.category', ['id' => 3])}}">动漫</a>
                    </h4>
                </div>
            </div>
            @foreach($info[3] as $item)
                @if(($loop->index%4) == 0)
                    <div class="row body">
                @endif
                <div class="col-xs-3 shipin">
                    <a href="{{route('video.info', $item->id)}}" class="thumbnail">
                        <img src="{{route('video.getThumb', $item->id)}}" alt="">
                        <div class="title">
                            <p class="text-center">{{$item->title}}</p>
                        </div>
                    </a>
                </div>
                @if($loop->index%4 == 3)
                    </div>
                @endif
            @endforeach
            <!--热门推荐end-->
        </div>
        <div class="panel-footer">
            <p class="text-center small">有些东西失去了就永远找不回</p>
        </div>
    </div>
</div>