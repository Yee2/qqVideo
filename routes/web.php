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
    //include_once(public_path().'\..\vendor\pusher\pusher-php-server\lib\Pusher.php');
    $options = array(
        'cluster' => 'ap1',
        'encrypted' => false
    );
    $pusher = new Pusher(
        '393cf83ed8f2f30f0e8c',
        '0d102b1fd2a1b6fed2ef',
        '331778',
        $options
    );

    $data['message'] = 'nihao';
    $pusher->trigger('my-channel', 'my-event', $data);
});