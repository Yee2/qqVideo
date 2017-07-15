<?php
/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 2017/7/15
 * Time: 20:37
 */

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoType;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class Se extends Controller
{
    private $agent;
    public function __construct()
    {
        $this->agent = new Agent();
    }

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $category = VideoType::get();
        $info = Video::orderBy('id', 'desc')->limit(5)->get();
        return $this->view('index', compact('category', 'info'));
    }

    /**
     * 分类
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Request $request, $id, $page = 1){
        $request->merge(['page' => $page]);
        $list = Video::where('type_id', $id)->orderBy('id', 'desc')->paginate(5);
        if(is_null($list)) return response('404');
        return $this->view('category', compact('list', 'id'));
    }

    /**
     * 详细
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info($id){
        $info = Video::find($id);
        if(is_null($info)) return response('404');
        $info['typeName'] = VideoType::where('id', $info->type_id)->value('name');
        return $this->view('info', compact('info'));
    }

    /**
     * 获取缩略图
     * @param $id 数据ID
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getThumb($id){
        $info = Video::find($id);
        if(is_null($info)) return response('404');
        $client = new Client();
        $file = $client->get($info->thumb);
        return response($file->getBody()->getContents())->header('Content-Type', "image/png");
    }

    /**
     * 手机自适应模板
     * @param string $template
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function view($template = '', $data = []){
        if($this->agent->isMobile()){
            return view('m_se.'.$template, $data);
        }
        return view($template, $data);
    }
}