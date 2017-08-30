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
    $url = 'http://v.youku.com/v_show/id_XMjk2OTUyOTUzNg==.html?spm=a2h1n.8251845.0.0';
    $dom = \phpQuery::newDocumentFileHTML($url, 'utf-8');
    $listDom = $dom->find('div[name="tvlist"]');
    $count = $listDom->count();
    for($i = 1; $i <= $count; $i++){
        $map = pq($listDom->eq($count-$i));

        var_dump(
            $map->find('a')->text(),
            $map->find('a')->attr('href'),"<br />"
        );
    }
});
Route::get('/', ['as' => 'video.index', 'uses' => 'Video@index']);
Route::get('/g/{id}/{page?}', ['as' => 'video.category', 'uses' => 'Video@category']);
Route::get('/v/{id}/{infoId?}', ['as' => 'video.info', 'uses' => 'Video@info']);
Route::get('/s/{title?}/{page?}', ['as' => 'video.search', 'uses' => 'Video@search']);
Route::get('/t/{id}', ['as' => 'video.getThumb', 'uses' => 'Video@getThumb']);