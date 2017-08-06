<div class="col-xs-12">
    <div class="panel panel-default contentLeft">
        <div class="panel-header">

        </div>
        <div class="panel-body dataList">
            <!--电影start-->
            <div class="list-group">
                @foreach($list as $item)
                    @if($loop->index %2 == 0)
                        <div class="row list-group-item shipin">
                            <div class="col-xs-6">
                                <a href="{{route('se.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                    <img src="{{route('se.getThumb', $item->id)}}" />
                                </a>
                                <a href="{{route('se.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                    <div class="title">{{$item->title}}</div>
                                </a>
                            </div>
                            @elseif($loop->index %2 == 1)
                                <div class="col-xs-6">
                                    <a href="{{route('se.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif class="thumbnail">
                                        <img src="{{route('se.getThumb', $item->id)}}" />
                                    </a>
                                    <a href="{{route('se.info', $item->id)}}" @if($data['isMobile']) target="_blank"@endif>
                                        <div class="title">{{$item->title}}</div>
                                    </a>
                                </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!--电影end-->
        </div>
        <div class="panel-footer">
            <nav aria-label="Page navigation" style="text-align: center">
                {{$list->links('paginate.se_m_category', ['id' => $id])}}
            </nav>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.page-link').css('background-color', '#000');
    })
</script>