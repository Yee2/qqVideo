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

Route::get('/', function () {
    $url = 'https://v.qq.com/x/cover/dhzimk1qzznf301/a0024157n9v.html';
    $contents = file_get_contents("compress.zlib://".$url);
    preg_match("/var COVER_INFO = (.+)\n/", $contents, $listMatch);
    $pathInfo = pathinfo($url);
    $json = json_decode($listMatch[1], true);
    $find = \App\Models\SpAlbum::where('title', '楚乔传')->first();
    if(!is_null($find)){
        if(is_null($find->tags)){
            $find->tags = implode(',', $json['subtype']);
        }
        if(is_null($find->descript)){
            $find->descript = $json['description'];
        }
        $find->save();
    }
    foreach ($json['vip_ids'] as $key => $item){
        $urls = 'https://v.qq.com/x/cover/'.$pathInfo['filename'].'/'.$item['V'].'.html';
        $data= [
            'albums_id' => 1,
            'title' => ($key+1),
            'source_url' => $urls,
        ];
        $info = \App\Models\SpVideo::where($data)->first();
        if(is_null($info)){
            $res = \App\Models\SpVideo::create($data);
        }
    }
    /*foreach ($list as $key => $item)
    {
        $map = pq($item);
        $data= [
            'albums_id' => 1,
            'title' => $map->text(),
            'source_url' => 'https://v.qq.com'.$map->find('a')->attr('href'),
        ];
        $info = \App\SpVideo::where($data)->first();
        if(is_null($info)){
            \App\SpVideo::create($data);
        }
    }*/
});
Route::get('/test', function() {
    $url = 'http://v.qq.com/x/list/movie?offset=0';
    $dom = \phpQuery::newDocumentFileHTML($url, 'utf-8');
    $listDom = $dom->find('.figures_list li>a');
    $pageTotal = $dom->find('.mod_pages span a:last')->text();
    foreach ($listDom as $item){
        $map = pq($item);
        $alt = $map->find('span.figure_info')->text();
        echo $alt.'<br />';
        //echo "url:".$map->attr('href')."name: {$alt}\r\n";
        if(!preg_match('/^(全|更).+/', $alt, $match)) continue;
        $data[] = [
            'title' => $map->find('img')->attr('alt'),
            'url' => $map->attr('href'),
            'thumb' => $map->find('img')->attr('r-lazyload')
        ];
    }
    dd($data, $dom->find('.mod_pages span a:last')->text());
});
Route::get('/phpinfo', function(){
    phpinfo();
});

Route::get('/se', ['as' => 'se.index', 'uses' => 'Se@index']);
Route::get('/se/t/{id}', ['as' => 'se.getThumb', 'uses' => 'Se@getThumb']);
Route::get('/se/g/{id}/{page?}', ['as' => 'se.category', 'uses' => 'Se@category']);
Route::get('/se/v/{id}', ['as' => 'se.info', 'uses' => 'Se@info']);
Route::get('/se/s/{title?}/{page?}', ['as' => 'se.search', 'uses' => 'Se@search']);