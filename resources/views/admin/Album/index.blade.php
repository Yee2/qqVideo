<div class="am-g">
    <div class="am-u-sm-12 am-u-md-12 am-fr">
        <form class="am-form-inline" id="searchForm">
            <div class="am-form-group">
                <input type="text" placeholder="标题" name="title" class="am-form-field am-radius"
                       value="{{request()->input('title')}}">
                <select class="am-form-field" name="type_id">
                    <option value="">所有类型</option>
                    <option value="1" @if(request()->input('type_id') == 1) selected @endif>电影</option>
                    <option value="2" @if(request()->input('type_id') == 2) selected @endif>电视</option>
                    <option value="3" @if(request()->input('type_id') == 3) selected @endif>动漫</option>
                </select>
                <select class="am-form-field" name="parse_type">
                    <option value="">全部来源</option>
                    <option value="qq" @if(request()->input('parse_type') == 'qq') selected @endif>腾讯</option>
                    <option value="youku" @if(request()->input('parse_type') == 'youku') selected @endif>优酷</option>
                </select>
                <select class="am-form-field" name="status">
                    <option value="">所有状态</option>
                    <option value="2" @if(request()->input('status') == '2') selected @endif>全集</option>
                    <option value="1" @if(request()->input('status') == '1') selected @endif>更新中</option>
                </select>
                <button class="am-btn am-btn-primary">查询</button>
                <a href="" id="searchHref"></a>
            </div>
        </form>
    </div>
</div>
<div class="am-g">
    <div class="am-u-sm-12 am-u-md-12">
        <table class="am-table am-table-bordered am-text-center">
            <thead>
            <tr>
                <th class="am-text-center">ID</th>
                <th class="am-text-center">类型</th>
                <th class="am-text-center">标题</th>
                <th class="am-text-center">来源</th>
                <th class="am-text-center">状态</th>
                <th class="am-text-center">集数</th>
                {{--<th class="am-text-center">缩略图</th>--}}
                <th class="am-text-center">创建时间</th>
                {{--<th class="am-text-center">更新时间</th>--}}
                <th class="am-text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nowType()}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->nowParseType()}}</td>
                    <td>{{($item->status == 2)?'全集':'更新中'}}</td>
                    <td>{{$item->total_num}}</td>
                    {{--<td>
                        <img src="{{$item->nowThumb()}}" class="am-img-thumbnail" style="width: 50px">
                    </td>--}}
                    <td>{{$item->created_at}}</td>
                    {{--<td>{{$item->updated_at}}</td>--}}
                    <td>
                        <div class="am-btn-group">
                            <a href="{{route('admin.Album.edit', $item->id)}}"
                               class="am-btn am-btn-primary am-radius">编辑</a>
                            <a href="{{route('admin.Album.queue', $item->id)}}" pjax="false"
                               class="am-btn am-btn-success am-radius queue"
                               data-am-loading="{spinner: 'circle-o-notch', loadingText: '添加中...', resetText: '已添加'}">任务</a>
                            <a href="{{route('admin.Album.destroy', $item->id)}}" pjax="false"
                               class="am-btn am-btn-danger am-radius delete"
                               data-am-loading="{spinner: 'circle-o-notch', loadingText: '删除中...', resetText: '已成功'}">删除</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="am-g">
    <div class="am-u-sm-12">
        {{$data->links('admin.Layout.paginate', [
        'query' => '&title='.request()->input('title').
        '&type_id='.request()->input('type_id').'&parse_type='.request()->input('title').
        '&status='.request()->input('status')
    ])}}
    </div>
</div>
<script>
    $(function(){
        $('.queue').click(function(e){
            e.preventDefault()
            var self = this
            $.ajax({
                url: $(this).prop('href'),
                type: 'get',
                beforeSend: function(){
                    $(self).button('loding');
                },
                success: function(res){
                    $(self).button('reset');
                }
            })
        })
        $('.delete').click(function(e){
            e.preventDefault()
            var self = this
            $.ajax({
                url: $(this).prop('href'),
                type: 'delete',
                data: {"_token": "{{csrf_token()}}"},
                beforeSend: function(){
                    $(self).button('loding');
                },
                success: function(res){
                    $(self).button('reset');
                }
            })
        })
    })
</script>