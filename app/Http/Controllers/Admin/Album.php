<?php
/**
 * Created by IntelliJ IDEA.
 * User: feizhugame
 * Date: 2017/9/5
 * Time: 12:59
 */

namespace App\Http\Controllers\Admin;


use App\Jobs\QqVideoOne;
use App\Jobs\YoukuOne;
use App\Models\SpAlbum;
use App\Models\SpVideo;
use Illuminate\Http\Request;

class Album extends Base
{
    /**
     * 列表页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 17:31
     */
    public function index(Request $request)
    {
        $data = SpAlbum::where(function ($query)use($request){
            if($request->has('title')){
                $query->where('title', 'like', "%".$request->input('title')."%");
            }
            if($request->has('type_id')){
                $query->where('type_id', $request->input('type_id'));
            }
            if($request->has('parse_type')){
                $query->where('parse_type', $request->input('parse_type'));
            }
            if($request->has('status')){
                $query->where('status', $request->input('status'));
            }
            if($request->has('total_num')){
                $query->where('total_num', $request->input('total_num'));
            }
        })->orderBy('id', 'desc')->paginate(8);
        return $this->view($request, 'Album.index', compact('data'));
    }

    /**
     * 编辑
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 17:31
     */
    public function edit(Request $request, $id)
    {
        $info = SpAlbum::where('id', $id)->first();
        $videos = SpVideo::where('albums_id', $id)->orderBy('title', 'asc')->get();
        return $this->view($request, 'Album.edit', compact('videos', 'info'));
    }

    /**
     * 更新数据
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $find = SpAlbum::find($id);
        if(is_null($find)) return self::error('数据不存在');
        $find->title = $request->input('title');
        $find->type_id = $request->input('type_id');
        $find->parse_type = $request->input('parse_type');
        $find->source_url = $request->input('source_url');
        $find->total_num = $request->input('total_num');
        $find->tags = $request->input('tags');
        $find->descript = $request->input('descript');
        $find->sort = $request->input('sort');
        $find->status = $request->input('status');
        if(!$find->save()) return self::error('更新失败');
        return self::success('保存成功');
    }

    /**
     * 软删除
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $find = SpAlbum::find($id);
        if(is_null($find)) return self::error('数据不存在');
        if(!$find->delete()) return self::error('删除失败');
        return self::success('删除成功');
    }

    /**
     * 保存视频信息
     * @param Request $request
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 17:44
     */
    public function saveVideo(Request $request){
        $find = SpVideo::find($request->input('id'));
        if(is_null($find)) return self::error('数据不存在');
        $find->title = $request->input('title');
        $find->source_url = $request->input('source_url');
        if(!$find->save()) return self::error('更新失败');
        return self::success('保存成功');
    }
    /**
     * 删除视频源
     * @param $id
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 17:42
     */
    public function deleteVideo($id)
    {
        $find = SpVideo::find($id);
        if(is_null($find)) return self::error('数据不存在');
        $find->delete();
        return self::success('删除成功');
    }

    public function queue($id)
    {
        $find = SpAlbum::find($id);
        if(is_null($find)) return self::error('数据不存在');
        $data = [
            'id' => $find->id,
            'title' => $find->title,
            'source_url' => $find->source_url,
            'parse_type' => 'youku',
            'status' => $find->status,
            'type_id' => $find->type_id,
        ];
        if($find->parse_type == 'qq'){
            dispatch(new QqVideoOne($data));
        }else if($find->parse_type == 'youku'){
            dispatch(new YoukuOne($data));
        }
        return self::success('添加成功');
    }
}