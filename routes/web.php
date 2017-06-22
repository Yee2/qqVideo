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
    return view('welcome');
});
Route::get('/test', function() {
    $file = \App\Video::find(1);
    $path = $file->file_url;
    set_time_limit(0);
    return readfile($path);
    /*$stream = new \App\VideoStream($path);
    return response()->stream(function() use ($stream) {
        $stream->start();
    });
    return response("File doesn't exists", 404);*/
});
Route::get('/phpinfo', function(){
    phpinfo();
});