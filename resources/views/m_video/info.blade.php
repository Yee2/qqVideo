<div class="col-xs-12">
    <div class="panel panel-default contentLeft">
        <div class="panel-header">
            <ol class="breadcrumb" style="margin: 0;">
                <li>
                    <a href="{{route('video.index')}}" title="{{config('site.title')}}">首页</a>
                </li>
                <li>
                    <a href="{{route('video.category', ['id', $info->type_id])}}"
                       title="{{$info['typeName']}}_{{config('site.title')}}">{{$info['typeName']}}</a>
                </li>
                <li class="active" title="{{$info->title}}_{{config('site.title')}}">{{$info->title}}</li>
            </ol>
        </div>
        <div class="dataInfo panel-body">
            <div class="row">
                <iframe src="{{$sourceUrl}}" style="width:100%;height: 550px;"></iframe>
            </div>
            <div class="row">
                <div class="btn-group" role="group">
                @foreach($videos as $item)
                    <a class="btn btn-primary" href="{{route('video.info', [
                        'id' => $info->id,
                        'infoId' => $item->id
                        ])}}">第{{$loop->iteration}}集</a>
                @endforeach
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <p class="text-center small">为您提供最全面最高效的视频订阅服务</p>
        </div>
    </div>
</div>
<div class="ads">
    <script language="javascript" src="http://sy.kcxsyz.com/1191/2/1"></script>
</div>
