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
Route::get('/v/{id}/{page?}', ['as' => 'video.info', 'uses' => 'Video@info']);
Route::get('/s/{title?}/{page?}', ['as' => 'video.search', 'uses' => 'Video@search']);
Route::get('/t/{id}', ['as' => 'video.getThumb', 'uses' => 'Video@getThumb']);

Route::get('/se', ['as' => 'se.index', 'uses' => 'Se@index']);
Route::get('/se/t/{id}', ['as' => 'se.getThumb', 'uses' => 'Se@getThumb']);
Route::get('/se/g/{id}/{page?}', ['as' => 'se.category', 'uses' => 'Se@category']);
Route::get('/se/v/{id}', ['as' => 'se.info', 'uses' => 'Se@info']);
Route::get('/se/s/{title?}/{page?}', ['as' => 'se.search', 'uses' => 'Se@search']);