<div class="am-g">
    <div class="am-u-sm-5">
        <div class="am-panel am-panel-primary">
            <div class="am-panel-hd">编辑《{{$info->title}}》</div>
            <div class="am-panel-bd">
                <div class="am-g">
                    <form action="" class="am-form am-u-sm-11">
                        <div class="am-form-group">
                            <div class="am-g">
                                <label class="am-u-sm-2 am-text-right">标题</label>
                                <div class="am-u-sm-10">
                                    <input type="text" value="{{$info->title}}" name="title" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-g">
                                <label class="am-u-sm-2 am-text-right">类型</label>
                                <div class="am-u-sm-10">
                                    <select name="type_id" data-am-selected="{btnWidth: '100%', btnSize: 'sm', btnStyle: 'secondary'}">
                                        <option value="1" @if($info->type_id == '1') selected @endif>电影</option>
                                        <option value="2" @if($info->type_id == '2') selected @endif>电视剧</option>
                                        <option value="3" @if($info->type_id == '3') selected @endif>动漫</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-g">
                                <label class="am-u-sm-2 am-text-right">解析</label>
                                <div class="am-u-sm-10">
                                    <select name="parse_type" data-am-selected="{btnWidth: '100%', btnSize: 'sm', btnStyle: 'secondary'}">
                                        <option value="qq" @if($info->parse_type == 'qq') selected @endif>腾讯</option>
                                        <option value="youku" @if($info->parse_type == 'youku') selected @endif>优酷</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-g">
                                <label class="am-u-sm-2 am-text-right">来源</label>
                                <div class="am-u-sm-10">
                                    <input type="text" placeholder="来源" name="source_url" value="{{$info->source_url}}">
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-g">
                                <label class="am-u-sm-2 am-text-right">缩略图</label>
                                <div class="am-u-sm-10">
                                    <input type="text" placeholder="缩略图" name="thumb" value="{{$info->nowThumb()}}">
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-g">
                                <label class="am-u-sm-2 am-text-right">标签</label>
                                <div class="am-u-sm-10">
                                    <input type="text" placeholder="标签" name="tags" value="{{$info->tags}}">
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-g">
                                <label class="am-u-sm-2 am-text-right">描述</label>
                                <div class="am-u-sm-10">
                                    <textarea name="descript" rows="8">{{$info->descript}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-g">
                                <label class="am-u-sm-2 am-text-right">排序</label>
                                <div class="am-u-sm-10">
                                    <input type="text" placeholder="排序" name="sort" value="{{$info->sort}}">
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-g">
                                <div class="am-u-sm-10 am-u-sm-offset-2">
                                    <label class="am-radio-inline">
                                        <input type="radio"  value="2" name="status" @if($info->status == 2) checked @endif> 全集
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="status" value="1" @if($info->status == 1) checked @endif> 正在更新
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-offset-2">
                                <button type="submit" class="am-btn am-btn-success">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="am-u-sm-7">
        <table class="am-table am-table-bordered am-text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>来源地址</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($videos as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>
                        <input type="text" name="title" value="{{$item->title}}" class="am-form-field">
                    </td>
                    <td>
                        <input type="text" name="source_url" value="{{$item->source_url}}" class="am-form-field">
                    </td>
                    <td>
                        <a href="{{$item->source_url}}" class="am-btn am-btn-primary" target="_blank">访问来源</a>
                        <button type="button" data-id="{{$item->id}}" class="am-btn am-btn-primary save"
                                data-am-loading="{spinner: 'circle-o-notch', loadingText: '加载中...', resetText: '保存成功'}">保存</button>
                        <button type="button" data-id="{{$item->id}}" class="am-btn am-btn-danger delete"
                                data-am-loading="{spinner: 'circle-o-notch', loadingText: '加载中...', resetText: '删除成功'}">删除</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function(){
        $('.delete').click(function (e) {
            e.preventDefault()
            var self = $(this)
            $.ajax({
                url: "{{route('admin.Album.deleteVideo')}}/"+$(this).data('id'),
                type: 'get',
                beforeSend: function(){
                    $(self).button('loding');
                },
                success: function(res){
                    $(self).button('reset');
                }
            })
        })
        $('.save').click(function (e) {
            e.preventDefault()
            var self = this,
                map = {id: $(this).data('id')}
            map.title = $(this).parent('td').siblings().find('input[name="title"]').val()
            map.source_url = $(this).parent('td').siblings().find('input[name="source_url"]').val()
            map._token = "{{csrf_token()}}"
            $.ajax({
                url: "{{route('admin.Album.saveVideo')}}",
                type: 'post',
                data: map,
                beforeSend: function(){
                    $(self).button('loading');
                },
                success: function(res){
                    $(self).button('reset');
                }
            })
        })
    })
</script>