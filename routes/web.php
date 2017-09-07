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

Route::get('/', ['as' => 'video.index', 'uses' => 'Video@index']);
Route::get('/g/{id}/{page?}', ['as' => 'video.category', 'uses' => 'Video@category']);
Route::get('/v/{id}/{infoId?}', ['as' => 'video.info', 'uses' => 'Video@info']);
Route::get('/s/{title?}/{page?}', ['as' => 'video.search', 'uses' => 'Video@search']);
Route::get('/t/{id}', ['as' => 'video.getThumb', 'uses' => 'Video@getThumb']);

Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function (){
    Route::get('index', ['as' => 'Index.index', 'uses' => 'Index@index']);
    Route::post('saveVideo', ['as' => 'Album.saveVideo', 'uses' => 'Album@saveVideo']);
    Route::get('deleteVideo/{id?}', ['as' => 'Album.deleteVideo', 'uses' => 'Album@deleteVideo']);
    Route::get('queue/{id}', ['as' => 'Album.queue', 'uses' => 'Album@queue']);
    Route::resource('Album', 'Album');
});
Route::get('/test', function(){
    $url = 'https://h5vv.video.qq.com/getinfo?callback=c&&otype=json&platform=11001&vid=k0024e4fiml';
    $client = new \GuzzleHttp\Client();
    $request = $client->get($url, [
        'verify' => false
    ]);
    $body = mb_substr($request->getBody()->getContents(), 2, -1);
    dd(json_decode($body));
});
