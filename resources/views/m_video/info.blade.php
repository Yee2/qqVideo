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
        <iframe src="{{$sourceUrl}}" style="width:100%;height: 550px;"></iframe>
        <div class="am-btn-group" style="width: 100%">
            <button class="am-btn am-btn-secondary" style="width: 88%">正在播放：第1集</button>
            <div class="am-dropdown" data-am-dropdown>
                <button class="am-btn am-btn-secondary am-dropdown-toggle" data-am-dropdown-toggle>
                    <span class="am-icon-caret-down"></span>
                </button>
                <ul class="am-dropdown-content">
                    @foreach($videos as $item)
                        @if($item->id == $infoId)
                            <li class="am-active"><a href="#">第{{$loop->iteration}}集</a></li>
                        @else
                            <li>
                                <a href="{{route('video.info', [
                            'id' => $info->id,
                            'infoId' => $item->id
                            ])}}">第{{$loop->iteration}}集</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="SOHUCS" sid="{{$info->id}}" ></div>
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
