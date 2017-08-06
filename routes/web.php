<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function(){
    function sign($data){
        ksort($data);
        $str = [];
        while (list($key, $val) = each($data)){
            $str[] = $key.'='.$val;
        }
        $appKey = '890af5a78c59e320d516a9d0d10bed5c';
        //dd(implode('&', $str)."&key=".$appKey);
        return md5(implode('&', $str)."&key=".$appKey);
    }
    function curlPost($url, $data){
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //设置post数据
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //执行命令
        $result = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        return $result;
    }
    $url = 'https://payh5.bbnpay.com/cpapi/place_order.php';
    $map = [
        'appid' => '7062017080459345',
        'goodsid' => '1041',
        'goodsname' => '微信支付',
        'pcorderid' => md5(time()),
        'money' => '1',
        'currency' => 'CHY',
        'pcuserid' => '1',
        'feetype' => 1,
        'paytype' => 1,
        //'pcprivateinfo' => '',
        'notifyurl' => 'http://www.game224.com/test/notice',
    ];
    $maps = [
        'transdata' => urlencode(json_encode($map)),
    ];
    $maps['sign'] = urlencode(sign($map));
    $maps['signtype'] = 'MD5';
    $res = curlPost($url, $maps);
    $results = explode('&', urldecode($res));
    $transdatas = $results[0];
    $transdata = explode('=', $transdatas);
    $json = json_decode($transdata[1], true);
    $clientUrl = 'https://payh5.bbnpay.com/browserh5/paymobile.php';
    $cilentMap = [
        'app' => '7062017080459345',
        'transid' => $json['transid'],
        'backurl' => 'http://www.game224.com/dadafa',
    ];
    $clientMaps['sign'] = sign($cilentMap);
    $clientMaps['signtype'] = urlencode(sign($cilentMap));
    $clientMaps['data'] = urlencode(json_encode($cilentMap));
    /*$opts = [
        'http'=> [
            'ignore_errors'=>true,
            'method'=>"GET",
            'header'=>"Content-type: application/x-www-form-urlencoded\r\n".
                "Host: www.game224.com\r\n".
                "Referer: http://www.game224.com\r\n".
                "\r\n",
        ]
    ];
    $context = stream_context_create($opts);
    $getUrlContents = @file_get_contents($clientUrl.'?'.http_build_query($clientMaps), FALSE, $context);
    return response($getUrlContents);*/
    return redirect($clientUrl.'?'.http_build_query($clientMaps));
});

Route::get('/', ['as' => 'video.index', 'uses' => 'Video@index']);
Route::get('/g/{id}/{page?}', ['as' => 'video.category', 'uses' => 'Video@category']);
Route::get('/v/{id}/{page?}', ['as' => 'video.info', 'uses' => 'Video@info']);
Route::get('/s/{title?}/{page?}', ['as' => 'video.search', 'uses' => 'Video@search']);
Route::get('/t/{id}', ['as' => 'video.getThumb', 'uses' => 'Video@getThumb']);

Route::get('/se', ['as' => 'se.index', 'uses' => 'Se@index']);
Route::get('/se/t/{id}', ['as' => 'se.getThumb', 'uses' => 'Se@getThumb']);
Route::get('/se/g/{id}/{page?}', ['as' => 'se.category', 'uses' => 'Se@category']);
Route::get('/se/v/{id}', ['as' => 'se.info', 'uses' => 'Se@info']);
Route::get('/se/s/{title?}/{page?}', ['as' => 'se.search', 'uses' => 'Se@search']);