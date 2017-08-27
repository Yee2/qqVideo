<div class="col-xs-12">
    <div class="panel panel-default contentLeft">
        <div class="panel-header">
            <ol class="breadcrumb" style="margin: 0;">
                <li>
                    <a href="{{route('video.index')}}" title="{{config('site.title')}}">首页</a>
                </li>
                <li>
                    <a href="{{route('video.category', $info->type_id)}}"
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
                    @if($item->id == $infoId)
                        <button class="btn btn-info">第{{$loop->iteration}}集</button>
                    @else
                        <a class="btn btn-primary" href="{{route('video.info', [
                            'id' => $info->id,
                            'infoId' => $item->id
                            ])}}">第{{$loop->iteration}}集</a>
                    @endif
                @endforeach
                </div>
            </div>
            <div class="row">
                <!--PC和WAP自适应版-->
                <div id="SOHUCS" sid="请将此处替换为配置SourceID的语句" ></div>
                <script type="text/javascript">
                    (function(){
                        var appid = 'cysXcUQEm';
                        var conf = 'prod_726a909befa5b2d9187dc6413e24479a';
                        var width = window.innerWidth || document.documentElement.clientWidth;
                        if (width < 960) {
                            window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript"' +
                                'src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>');
                        } else {
                            var loadJs=function(d,a){
                                var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;
                                var b=document.createElement("script");
                                b.setAttribute("type","text/javascript");
                                b.setAttribute("charset","UTF-8");
                                b.setAttribute("src",d);
                                if(typeof a==="function"){
                                    if(window.attachEvent){
                                        b.onreadystatechange=function(){
                                            var e=b.readyState;
                                            if(e==="loaded"||e==="complete"){
                                                b.onreadystatechange=null;
                                                a()
                                            }
                                        }
                                    }else{b.onload=a}
                                }
                                c.appendChild(b)
                            };
                            loadJs(
                                "https://changyan.sohu.com/upload/changyan.js",
                                function(){
                                    window.changyan.api.config({appid:appid,conf:conf})
                                });
                        } })();
                </script>
            </div>
        </div>
        <div class="panel-footer">
            @include("m_video.copyright")
        </div>
    </div>
</div>
<div class="ads">
    <script language="javascript" src="http://sy.kcxsyz.com/1191/2/1"></script>
</div>
