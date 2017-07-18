<div class="col-xs-12">
    <div class="panel panel-default contentLeft">
        <div class="panel-header">

        </div>
        <div class="panel-body dataList">
            <!--电影start-->
            <div class="row body">
                @foreach($list as $item)
                    <div class="col-xs-3 shipin">
                        <a href="{{route('video.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                            <img src="{{route('video.getThumb', $item->id)}}">
                            <div class="title">
                                <p class="text-center">{{$item->title}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!--电影end-->
        </div>
        <div class="panel-footer">
            <nav aria-label="Page navigation" style="text-align: center">
                {{$list->links('paginate.video_m_category', ['id' => $id])}}
            </nav>
        </div>
    </div>
</div>