<div class="col-xs-12">
    <div class="panel panel-default contentLeft">
        <div class="panel-header">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="./">首页</a>
                    </li>
                    <li>
                        <a href="{{route('video.category', ['id', $info->type_id])}}">{{$info['typeName']}}</a>
                    </li>
                    <li class="active">{{$info->title}}</li>
                </ol>
            </div>
        </div>
        <div class="panel-body dataInfo">
            <div class="panel-body">
                <div class="row">
                    <iframe src="{{$sourceUrl}}" style="width:100%;height: 550px;"></iframe>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>在线播放</strong>
                        </div>
                        <div class="panel-body">
                            <div class="video-play-src row">
                                {{$videos->links('paginate.video_m_info', ['id' => $info->id])}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 shipin">
                        <a href="#" class="thumbnail">
                            <img src="img/i1498560651_1.jpg" alt="">
                            <div class="title">
                                <p>睡在我上铺的兄弟</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4 shipin">
                        <a href="#" class="thumbnail">
                            <img src="img/i1498560651_1.jpg" alt="">
                            <div class="title">
                                <p>睡在我上铺的兄弟</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4 shipin">
                        <a href="#" class="thumbnail">
                            <img src="img/i1498560651_1.jpg" alt="">
                            <div class="title">
                                <p>睡在我上铺的兄弟</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <p class="text-center small">为您提供最全面最高效的视频订阅服务</p>
        </div>
    </div>
</div>
<script src="https://api.seohaochen.com/vplay/vparse.js?ver=2017041702"></script>
<script>
    console.log(vParser.h5play.parse());
</script>
