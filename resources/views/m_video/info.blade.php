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
        <iframe src="{{config('site.playUrl')}}{{$sourceUrl}}" style="width:100%;height: 550px;"></iframe>
        <div style="width:100%">
            <div class="am-btn-group" style="width: 100%;overflow-x: scroll;white-space: nowrap;">
                @foreach($videos as $item)
                    @if($item->id == $infoId)
                        <a class="am-btn am-btn-primary" style="float:none">第{{$loop->iteration}}集</a>
                    @else
                        <a href="{{route('video.info', [
                            'id' => $info->id,
                            'infoId' => $item->id
                            ])}}" class="am-btn am-btn-secondary"
                           style="float:none" pjax="false"
                           data-href="{{config('site.playUrl')}}{{$item->source_url}}">
                            第{{$loop->iteration}}集
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="am-panel-ft">

    </div>
</div>
@section("footer_script")
<script>
    $(function(){
        $('a[pjax="false"]').click(function(e){
            e.preventDefault()
            console.log($(this).prop('href'))
            $('iframe').prop('src', $(this).data('href'))
            history.pushState({}, $('title').text().$(this).text(), $(this).prop('href'));
        })
    })
</script>
@endsection