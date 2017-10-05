<div class="banner">
    <ul class="bxslider">
        <li><img src="/static/c89919ab5f304aa28cdbb4af876bfb67.jpg" /></li>
        <li><img src="/static/d2ad98f9fb4c422692ad0874b2aa90e5.jpg" /></li>
        <li><img src="/static/d5d6fc58102c428989bbef5982e290d8.jpg" /></li>
        <li><img src="/static/f845a1c11eb74d75965f623d46d8d845.jpg" /></li>
    </ul>
</div>
<div class="bar_wrap">
    <div class="bar_rail">
        <div></div>
        <a href="{{route('video.category', 1)}}"><span>电影</span></a>
    </div>
</div>
<div class="movie-list">
    @foreach($infoPc[1] as $item)
        <div class="item">
            <div class="cover">
                <img src="{{$item->nowThumb()}}" />
                <a href="{{route('video.info', $item->id)}}" class="This-is-link"></a>
            </div>
            <div class="name">
                {{$item->title}}
            </div>
        </div>
    @endforeach
</div>
<div class="bar_wrap">
    <div class="bar_rail">
        <div></div>
        <a href="{{route('video.category', ['id' => 2])}}"><span>电视剧</span></a>
    </div>
</div>
<div class="movie-list">
    @foreach($infoPc[2] as $item)
        <div class="item">
            <div class="cover">
                <img src="{{$item->nowThumb()}}" />
                <a href="{{route('video.info', $item->id)}}" class="This-is-link"></a>
            </div>
            <div class="name">
                {{$item->title}}
            </div>
        </div>
    @endforeach
</div>

<div class="bar_wrap">
    <div class="bar_rail">
        <div></div>
        <a href="{{route('video.category', ['id' => 3])}}"><span>动漫</span></a>
    </div>
</div>
<div class="movie-list">
    @foreach($infoPc[3] as $item)
        <div class="item">
            <div class="cover">
                <img src="{{$item->nowThumb()}}" />
                <a href="{{route('video.info', $item->id)}}" class="This-is-link"></a>
            </div>
            <div class="name">
                {{$item->title}}
            </div>
        </div>
    @endforeach
</div>
