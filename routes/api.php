<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'posts'], function () {
    Route::get('', 'PostController@getAllPosts')->name('api.post.index');
    Route::get('{id}', 'PostController@getPostById')->name('api.post.show');
    Route::post('', 'PostController@createPost')->name('api.post.store');
});
