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
            <div id="videoGroup" class="am-btn-group" style="width: 100%;overflow-x: scroll;white-space: nowrap;">
                @foreach($videos as $item)
                    <a href="{{route('video.info', [
                        'id' => $info->id,
                        'infoId' => $item->id
                        ])}}" class="am-btn @if($item->id == $infoId) am-btn-default @else am-btn-secondary @endif"
                       style="float:none" pjax="false" title="第{{$item->title}}集_{{$info->title}}_{{config('site.title')}}"
                       data-href="{{config('site.playUrl')}}{{$item->source_url}}" data-index="{{$loop->index}}">
                        第{{$loop->iteration}}集
                    </a>
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
        move($('a.am-btn-default').data('index'))
        $('a[pjax="false"]').click(function(e){
            e.preventDefault()
            $('iframe').prop('src', $(this).data('href'))
            $('title').text($(this).attr('title'))
            history.pushState({}, '', $(this).prop('href'))
            $(this).siblings().addClass('am-btn-secondary').removeClass('am-btn-default')
            $(this).removeClass('am-btn-secondary').addClass('am-btn-default')
            move($(this).data('index'))
        })
    })
    function move(index) {
        var btnWidth = $('a.am-btn-default').width()
        $('#videoGroup').scrollLeft((btnWidth+2*index)*index)
    }
</script>
@endsection