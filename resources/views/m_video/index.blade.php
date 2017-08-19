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
                                        <div class="title">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %2 == 1)
                                    <div class="col-xs-6">
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                            <img src="{{route('video.getThumb', $item->id)}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                            <div class="title">{{$item->title}}</div>
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
                <script language="javascript" src="http://sy.kcxsyz.com/1191/2/1"></script>
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
                                        <div class="title">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %2 == 1)
                                    <div class="col-xs-6">
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                            <img src="{{route('video.getThumb', $item->id)}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                            <div class="title">{{$item->title}}</div>
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
                <script language="javascript" src="http://sy.kcxsyz.com/1191/2/1"></script>
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
                                        <div class="title">{{$item->title}}</div>
                                    </a>
                                </div>
                                @elseif($loop->index %2 == 1)
                                    <div class="col-xs-6">
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                            <img src="{{route('video.getThumb', $item->id)}}" />
                                        </a>
                                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                            <div class="title">{{$item->title}}</div>
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
                <script language="javascript" src="http://sy.kcxsyz.com/1191/2/1"></script>
            </div>

            <!--热门推荐end-->
        </div>
        <div class="panel-footer">
            <p class="text-center small">有些东西失去了就永远找不回</p>
        </div>
    </div>
</div>