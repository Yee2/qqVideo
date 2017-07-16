<?php

namespace App\Http\Controllers;

use App\Models\SpAlbum;
use App\Models\SpThumb;
use App\Models\SpVideo;
use App\Models\SpVideoType;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class Video extends Controller
{
    private $agent;
    public function __construct()
    {
        $this->agent = new Agent();
        $category = SpVideoType::get();
        $title = SpAlbum::getRandTitle();
        view()->share('data', [
            'category' => $category,
            'title' => substr($title, 2),
            'isMobile' => $this->agent->isMobile()
        ]);
    }

    public function index(Request $request){
        $info = SpAlbum::getCategoryDatas(8);
        $hot = SpAlbum::getHots();
        //dd($info);
        return $this->view($request,'index', compact('info', 'hot'));
    }
    
    public function category(Request $request, $id, $page = 1){
        $request->merge(['page' => $page]);
        $list = SpAlbum::where('type_id', $id)->orderBy('id', 'asc')->paginate(16);
        if(is_null($list)) return response('404');
        $cateName = SpVideoType::getNameById($id);
        return $this->view($request, 'category', compact('list', 'id', 'cateName'));
    }

    public function info(Request $request, $id, $page = 1)
    {
        $info = SpAlbum::find($id);
        if(is_null($info)) return response('404');
        $info['typeName'] = SpVideoType::where('id', $info->type_id)->value('name');
        $videos = SpVideo::where('albums_id', $id)->paginate(1);
        dd($videos);
        $sourceUrl = "https://api.vparse.org/?skin=47ks&url=".$videos[0]->source_url;
        return $this->view($request, 'info', compact('info', 'videos', 'sourceUrl'));
    }

    public function search(Request $request, $title = '', $page = 1){
        $title = $request->has('title')?$request->input('title'):$title;
        $request->merge(['page' => $page]);
        $list = SpAlbum::where('title', 'like', '%'.$title.'%')
            ->orderBy('id', 'asc')->paginate(16);
        if(is_null($list)) return response('404');
        return $this->view($request, 'search', compact('list', 'title'));
    }

    /**
     * 获取缩略图
     * @param $id 数据ID
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getThumb($id){
        $info = SpThumb::where('albums_id', $id)->first();
        if(is_null($info)) return response('404');
        $client = new Client();
        $file = $client->get($info->thumb, [
            'verify' => false
        ]);
        return response($file->getBody()->getContents())
            ->header('Content-Type', "image/png")
            ->header('Cache-Control', "private, max-age=10800, pre-check=10800")
            ->header('Pragma', "private")
            ->header('Expires', date(DATE_RFC822,strtotime(" 2 day")));
    }

    /**
     * 手机自适应模板
     * @param string $template
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function view(Request $request, $template = '', $data = []){
        if(!$request->ajax()){
            $template = 'http_m_video.'.$template;
        }else{
            $template = 'm_video.'.$template;
        }
        return view($template, $data);
    }
}
