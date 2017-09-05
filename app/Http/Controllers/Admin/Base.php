<?php
/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 2017/8/26
 * Time: 17:08
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Base extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 手机自适应模板
     * @param string $template
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view(Request $request, $template = '', $data = []){
        $template = (!$request->ajax()?('http_admin.' . $template):('admin.'.$template));
        return view($template, $data);
    }

    /**
     * 接口返回
     * @param $msg
     * @param $code
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 17:54
     */
    protected static function msg($msg, $code)
    {
        return response()->json([
            'msg' => $msg,
            'status' => $code
        ]);
    }

    /**
     * 异步失败提示
     * @param $msg
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 17:54
     */
    protected static function error($msg){
        return self::msg($msg, 403);
    }

    /**
     * 异步成功提示
     * @param $msg
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 17:54
     */
    protected static function success($msg){
        return self::msg($msg, 200);
    }
}